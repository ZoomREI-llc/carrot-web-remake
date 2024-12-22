<?php

// Register the REST route
add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/lead-form-v2', array(
        'methods' => 'POST',
        'callback' => 'handle_lead_form_v2',
        'permission_callback' => '__return_true', // Allow public access
    ));
});

// Define the form submission handler
if(!function_exists('handle_lead_form_v2')) {
    function handle_lead_form_v2(WP_REST_Request $request)
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        
        $form_data = $request->get_params();
        $is_test_request = (isset($form_data['phone']) && in_array($form_data['phone'], ['8888888888', '777777777'])) || (isset($form_data['fullName']) && $form_data['fullName'] === 'test');
        $webhooks = $form_data['webhooks'] ? json_decode($form_data['webhooks'], true) : [];
        
        function validatePhone($number)
        {
            $is_valid = true;
            
            $invalidPatterns = [
                '/^(\d)\1{9}$/',         // Repeating digits
                '/^1234567890$/',        // Sequential digits
                '/^0987654321$/',        // Reverse sequential digits
                '/^0+$/',                // All zeros
                '/^1+$/'                 // All ones
            ];
            
            foreach ($invalidPatterns as $pattern) {
                if (preg_match($pattern, $number)) {
                    $is_valid = false;
                }
            }
            
            if (!$is_valid) {
                return [
                    'is_valid' => false,
                    'errors'   => [
                        'phone' => 'Invalid phone number'
                    ]
                ];
            }
            
            $apiKey = 'd1c478a64c53bed8fa503af6541b7c21';
            $url = 'https://apilayer.net/api/validate?access_key=' . $apiKey . '&number=' . urlencode($number);
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            
            $data = json_decode($response, true);
            
            if ($data && isset($data['valid'])) {
                $allowedLineTypes = [
                    'mobile',
                    'fixed_line',
                    'fixed_line_or_mobile',
                    'voip',
                    'landline'
                ];
                if (!$data['valid'] || !in_array($data['line_type'], $allowedLineTypes)) {
                    return [
                        'is_valid' => false,
                        'errors'   => [
                            'phone' => 'Invalid phone number'
                        ],
                        'response' => $data,
                        'phone'    => $number
                    ];
                }
            } else {
                return [
                    'is_valid' => false,
                    'errors'   => [
                        'phone' => 'Unable to validate phone number. Please try again later.'
                    ]
                ];
            }
            return [
                'is_valid' => true
            ];
        }
        
        if (isset($form_data['phone'])) {
            $form_data['phone'] = '+1' . $form_data['phone'];
            if (!$is_test_request) {
                $phone_valid = validatePhone($form_data['phone']);
                
                if (!$phone_valid['is_valid']) {
                    wp_send_json_error($phone_valid, 300);
                }
            }
        }
        if (isset($form_data['landline'])) {
            $form_data['landline'] = '+1' . $form_data['landline'];
        }
        
        $fieldDatas = [];
        foreach ($webhooks as $webhook) {
            if ($webhook['usePreset']) {
                $presets_dir = plugin_dir_path(__FILE__) . 'presets/';
                $preset_path = $presets_dir . $webhook['fieldsPreset'] . '.php';
                if (!file_exists($preset_path)) {
                    continue;
                }
                $mapping = include $preset_path;
            } else {
                if (!$webhook['url']) {
                    continue;
                }
                $mapping = $webhook['fieldsMapping'];
            }
            
            if (empty($mapping)) {
                continue;
            }
            
            $fieldData = [];
            
            foreach ($mapping as $field) {
                if (!$field['field'] || !$field['key']) {
                    continue;
                }
                if (isset($form_data[$field['field']])) {
                    $fieldData[$field['key']] = $form_data[$field['field']];
                } elseif (isset($field['default'])) {
                    $fieldData[$field['key']] = $field['default'];
                } else {
                    $fieldData[$field['key']] = '';
                }
            }
            
            $fieldDatas[] = [
                'url'  => $webhook['url'],
                'body' => $fieldData
            ];
            
            if (!empty($fieldData)) {
                $response = wp_remote_post($webhook['url'], array(
                    'body'    => json_encode($fieldData),
                    'headers' => array(
                        'Content-Type' => 'application/json',
                    ),
                ));
                
                if (is_wp_error($response)) {
                    return new WP_REST_Response('Error sending data to webhook', 500);
                }
            }
        }
        wp_send_json_success($fieldDatas);
        
        
        return new WP_REST_Response('Form submitted successfully', 200);
    }
}