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
    $webhooks = $form_data['webhooks'] ? json_decode($form_data['webhooks'], true) : [];
    
    $fieldDatas = [];
    foreach ($webhooks as $webhook) {
        if($webhook['usePreset']){
            $presets_dir = plugin_dir_path(__FILE__) . 'presets/';
            $preset_path = $presets_dir . $webhook['fieldsPreset'] .'.php';
            if(!file_exists($preset_path)){
                continue;
            }
            $mapping = include $preset_path;
        } else {
            if(!$webhook['url']){
                continue;
            }
            $mapping = $webhook['fieldsMapping'];
        }
        
        if(empty($mapping)){
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
            }
        }
        
        $fieldDatas[] = [
            'url' => $webhook['url'],
            'body' => $fieldData
        ];
        
        if (!empty($fieldData)) {
            $response = wp_remote_post($webhook['url'], array(
                'body' => json_encode($fieldData),
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