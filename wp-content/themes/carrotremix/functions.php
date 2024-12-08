<?php
define('GOOGLE_MAPS_API_KEY', 'AIzaSyCwwLF50kEF6wS1rTEqTDPfTXcSlF9REuI');
// Enqueue Scripts and Styles
function carrot_enqueue_assets()
{
    $style_version = filemtime(get_template_directory() . '/dist/style.css');

    wp_enqueue_style('carrot-styles', get_template_directory_uri() . '/dist/style.css', array(), $style_version);
    wp_enqueue_script('carrot-mobile-menu', get_template_directory_uri() . '/src/js/mobile-menu.js', array(), null, true);
    wp_enqueue_script('gf-full-address', get_template_directory_uri() . '/src/js/full-address-field.js', array(), true);
    wp_enqueue_script('lead-source-tracker', get_template_directory_uri() . '/src/js/lead-source-tracker.js ', array(), true);
    wp_enqueue_script('params-persister', get_template_directory_uri() . '/src/js/params-persister.js ', array(), true);
    wp_enqueue_script('events-handler', get_template_directory_uri() . '/src/js/events-handler.js ', array(), true);

    wp_localize_script('events-handler', 'formConfig', array(
        'googleMapsApiKey' => GOOGLE_MAPS_API_KEY,
        'storagePrefix' => 'chrisbuys_',
    ));
}
add_action('wp_enqueue_scripts', 'carrot_enqueue_assets');

// Theme Support
function chris_buys_homes_theme_support()
{
    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');
    add_theme_support('editor-color-palette');
    add_editor_style('dist/style.css');
    add_theme_support('custom-logo', array(
        'height' => 'auto',
        'width' => 260,
        'flex-height' => true,
        'flex-width' => true,
    ));
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'chris_buys_homes_theme_support');

function chris_buys_homes_custom_js_customizer($wp_customize)
{
    // Add Section for Custom JavaScript
    $wp_customize->add_section('custom_js_section', array(
        'title'       => __('Custom JavaScript', 'chris_buys_homes'),
        'priority'    => 160,
    ));

    // Add Setting for Header JS Code
    $wp_customize->add_setting('custom_header_js_code', array(
        'default'           => '',
        'sanitize_callback' => 'chris_buys_homes_sanitize_js', // Custom sanitization
    ));

    // Add Control for Header JS Code (textarea)
    $wp_customize->add_control('custom_header_js_code', array(
        'label'    => __('Custom JavaScript for Header', 'chris_buys_homes'),
        'section'  => 'custom_js_section',
        'settings' => 'custom_header_js_code',
        'type'     => 'textarea',
    ));

    // Add Setting for Footer JS Code
    $wp_customize->add_setting('custom_footer_js_code', array(
        'default'           => '',
        'sanitize_callback' => 'chris_buys_homes_sanitize_js', // Custom sanitization
    ));

    // Add Control for Footer JS Code (textarea)
    $wp_customize->add_control('custom_footer_js_code', array(
        'label'    => __('Custom JavaScript for Footer', 'chris_buys_homes'),
        'section'  => 'custom_js_section',
        'settings' => 'custom_footer_js_code',
        'type'     => 'textarea',
    ));
}
add_action('customize_register', 'chris_buys_homes_custom_js_customizer');

// Sanitization function to allow <script> tags
function chris_buys_homes_sanitize_js($input)
{
    return wp_kses($input, array(
        'script' => array(
            'src'   => true,
            'async' => true,
            'defer' => true,
        )
    ));
}

// Output custom JS in head or footer based on Customizer setting
// Output custom JS for the header
function chris_buys_homes_output_header_js()
{
    $custom_header_js = get_theme_mod('custom_header_js_code');
    if (!empty($custom_header_js)) {
        echo $custom_header_js;
    }
}
add_action('wp_head', 'chris_buys_homes_output_header_js');

// Output custom JS for the footer
function chris_buys_homes_output_footer_js()
{
    $custom_footer_js = get_theme_mod('custom_footer_js_code');
    if (!empty($custom_footer_js)) {
        echo $custom_footer_js;
    }
}
add_action('wp_footer', 'chris_buys_homes_output_footer_js');

function add_custom_logo_class($html)
{
    // Check if the logo exists and add the custom class to the <a> tag
    $html = str_replace('custom-logo-link', 'custom-logo-link cb-header__logo--link', $html);
    return $html;
}
add_filter('get_custom_logo', 'add_custom_logo_class');

// Register Menus
function carrot_register_menus()
{
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
        'footer-navigation' => __('Footer Navigation'),
        'local-home-buyers' => __('Local Home Buyers In'),
        'we-buy-houses'     => __('We Buy Houses In'),
        'sell-your-house'   => __('Sell Your House In'),
        'cash-for-houses'   => __('Cash For Houses In'),
        'sell-your-house-in'   => __('Sell Your House in'),
    ));
}
add_action('init', 'carrot_register_menus');

// Custom Mobile Navigation Walker
class Mobile_Walker_Nav_Menu extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $polygon_icon_url = wp_get_attachment_url(406);
        $output .= '<li class="menu-item menu-item-' . $item->ID . '">';
        $output .= '<div class="menu-item-title"><a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
        if (in_array('menu-item-has-children', $item->classes)) {
            $output .= '<img class="polygon-icon" src="' . $polygon_icon_url . '"></div>';
        }
    }

    public function end_el(&$output, $item, $depth = 0, $args = array())
    {
        $output .= "</li>\n";
    }
}

// Create a custom site settings page
function create_site_settings_page()
{
    add_menu_page(
        'Site Settings',            // Page title
        'Site Settings',            // Menu title
        'manage_options',           // Capability
        'site-settings',            // Menu slug
        'site_settings_page_html',  // Callback function to render the page
        'dashicons-admin-generic',  // Icon (optional)
        20                          // Position in the admin menu
    );
}
add_action('admin_menu', 'create_site_settings_page');

function site_settings_page_html()
{
    if (!current_user_can('manage_options')) {
        return;
    }

    // Get the current blog ID (for multisite)
    $blog_id = get_current_blog_id();

    // Save the settings if the form is submitted
    if (isset($_POST['site_settings_update'])) {
        update_blog_option($blog_id, 'market_code', sanitize_text_field($_POST['market_code']));
        update_blog_option($blog_id, 'company_name', sanitize_text_field($_POST['company_name']));
        update_blog_option($blog_id, 'market_city', sanitize_text_field($_POST['market_city']));
        update_blog_option($blog_id, 'market_state', sanitize_text_field($_POST['market_state']));
        update_blog_option($blog_id, 'phone', sanitize_text_field($_POST['phone']));
        update_blog_option($blog_id, 'email', sanitize_email($_POST['email']));
        update_blog_option($blog_id, 'address', sanitize_text_field($_POST['address']));
        update_blog_option($blog_id, 'street_address', sanitize_text_field($_POST['street_address']));
        update_blog_option($blog_id, 'city', sanitize_text_field($_POST['city']));
        update_blog_option($blog_id, 'state', sanitize_text_field($_POST['state']));
        update_blog_option($blog_id, 'zipcode', sanitize_text_field($_POST['zipcode']));
        update_blog_option($blog_id, 'facebook_link', esc_url_raw($_POST['facebook_link']));
        update_blog_option($blog_id, 'twitter_link', esc_url_raw($_POST['twitter_link']));
        update_blog_option($blog_id, 'youtube_link', esc_url_raw($_POST['youtube_link']));
        update_blog_option($blog_id, 'linkedin_link', esc_url_raw($_POST['linkedin_link']));
        update_blog_option($blog_id, 'instagram_link', esc_url_raw($_POST['instagram_link']));
        update_blog_option($blog_id, 'pinterest_link', esc_url_raw($_POST['pinterest_link']));
        update_blog_option($blog_id, 'zillow_link', esc_url_raw($_POST['zillow_link']));
        echo '<div id="message" class="updated">Settings saved</div>';
    }

    // Retrieve the saved values for the current site
    $market_code = get_blog_option($blog_id, 'market_code', '');
    $company_name = get_blog_option($blog_id, 'company_name', '');
    $market_city = get_blog_option($blog_id, 'market_city', '');
    $market_state = get_blog_option($blog_id, 'market_state', '');
    $phone = get_blog_option($blog_id, 'phone', '');
    $email = get_blog_option($blog_id, 'email', '');
    $address = get_blog_option($blog_id, 'address', '');
    $street_address = get_blog_option($blog_id, 'street_address', '');
    $city = get_blog_option($blog_id, 'city', '');
    $state = get_blog_option($blog_id, 'state', '');
    $zipcode = get_blog_option($blog_id, 'zipcode', '');
    $facebook_link = get_blog_option($blog_id, 'facebook_link', '');
    $twitter_link = get_blog_option($blog_id, 'twitter_link', '');
    $youtube_link = get_blog_option($blog_id, 'youtube_link', '');
    $linkedin_link = get_blog_option($blog_id, 'linkedin_link', '');
    $instagram_link = get_blog_option($blog_id, 'instagram_link', '');
    $pinterest_link = get_blog_option($blog_id, 'pinterest_link', '');
    $zillow_link = get_blog_option($blog_id, 'zillow_link', '');

?>
    <div class="wrap">
        <h1>Site Settings</h1>
        <form method="POST" action="">
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="market_code">Market Code</label></th>
                    <td><input type="text" name="market_code" value="<?php echo esc_attr($market_code); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="company_name">Company Name</label></th>
                    <td><input type="text" name="company_name" value="<?php echo esc_attr($company_name); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="market_city">Market City</label></th>
                    <td><input type="text" name="market_city" value="<?php echo esc_attr($market_city); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="market_state">Market State</label></th>
                    <td><input type="text" name="market_state" value="<?php echo esc_attr($market_state); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="phone">Phone Number</label></th>
                    <td><input type="text" name="phone" value="<?php echo esc_attr($phone); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="email">Email</label></th>
                    <td><input type="email" name="email" value="<?php echo esc_attr($email); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="address">Address</label></th>
                    <td><input type="text" name="address" value="<?php echo esc_attr($address); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="street_address">Street Address</label></th>
                    <td><input type="text" name="street_address" value="<?php echo esc_attr($street_address); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="city">City</label></th>
                    <td><input type="text" name="city" value="<?php echo esc_attr($city); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="state">State</label></th>
                    <td><input type="text" name="state" value="<?php echo esc_attr($state); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="zipcode">Zipcode</label></th>
                    <td><input type="text" name="zipcode" value="<?php echo esc_attr($zipcode); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="facebook_link">Facebook Link</label></th>
                    <td><input type="url" name="facebook_link" value="<?php echo esc_attr($facebook_link); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="twitter_link">Twitter Link</label></th>
                    <td><input type="url" name="twitter_link" value="<?php echo esc_attr($twitter_link); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="youtube_link">YouTube Link</label></th>
                    <td><input type="url" name="youtube_link" value="<?php echo esc_attr($youtube_link); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="linkedin_link">LinkedIn Link</label></th>
                    <td><input type="url" name="linkedin_link" value="<?php echo esc_attr($linkedin_link); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="instagram_link">Instagram Link</label></th>
                    <td><input type="url" name="instagram_link" value="<?php echo esc_attr($instagram_link); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="pinterest_link">Pinterest Link</label></th>
                    <td><input type="url" name="pinterest_link" value="<?php echo esc_attr($pinterest_link); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="zillow_link">Zillow Link</label></th>
                    <td><input type="url" name="zillow_link" value="<?php echo esc_attr($zillow_link); ?>" class="regular-text"></td>
                </tr>
            </table>
            <input type="hidden" name="site_settings_update" value="Y">
            <p class="submit">
                <input type="submit" class="button-primary" value="Save Settings">
            </p>
        </form>
    </div>
<?php
}


// Template Part Loading Function
function carrot_get_template_part($slug, $name = null)
{
    $templates = array();

    if (isset($name)) {
        $templates[] = "templates/{$slug}-{$name}.php";
    }
    $templates[] = "templates/{$slug}.php";
    $templates[] = "{$slug}.php";

    locate_template($templates, true, false);
}

// Custom Header and Footer Functions
function carrot_get_header($name = null)
{
    $template = $name ? locate_template("templates/header-{$name}.php") : locate_template("templates/header.php");
    if ($template) {
        load_template($template);
    }
}

function carrot_get_footer($name = null)
{
    $template = $name ? locate_template("templates/footer-{$name}.php") : locate_template("templates/footer.php");
    if ($template) {
        load_template($template);
    }
}

// Template Part Loading with Fallback
function carrot_template_include($template)
{
    // Get the base name of the current template file
    $template_name = basename($template);

    // Get global post object
    global $post;

    // Log the current template and custom template path
    error_log('Current template: ' . $template);

    if (is_page()) {
        // Apply `legal.php` for Privacy Policy page (or based on title)
        if (strtolower($post->post_title) === 'privacy policy') {
            $legal_template = locate_template('templates/legal.php');
            if ($legal_template) {
                error_log('Legal page template found: ' . $legal_template);
                return $legal_template;
            } else {
                error_log('Legal page template not found');
            }
        }

        // Check if the title does not contain '##'
        if (strpos($post->post_title, '##') === false) {
            // Apply `seo-page.php` for pages without '##' in the title
            $seo_template = locate_template('templates/seo-page.php');
            if ($seo_template) {
                error_log('SEO page template found: ' . $seo_template);
                return $seo_template;
            } else {
                error_log('SEO page template not found');
            }
        }

        // If no conditions matched, use the default page template
        $page_template = locate_template('templates/page.php');
        if ($page_template) {
            error_log('Page template found: ' . $page_template);
            return $page_template;
        } else {
            error_log('Page template not found');
        }
    }

    // Check if the current page is the blog page and use `index.php`
    if (is_home()) {
        $blog_template = locate_template('index.php');
        if ($blog_template) {
            error_log('Blog page template found: ' . $blog_template);
            return $blog_template;
        } else {
            error_log('Blog page template not found');
        }
    }

    // Other conditions for different templates (single, author, category, etc.) remain unchanged
    if (is_single()) {
        $single_template = locate_template('templates/single.php');
        if ($single_template) {
            error_log('Single post template found: ' . $single_template);
            return $single_template;
        } else {
            error_log('Single post template not found');
        }
    }

    // Handle 404 template
    if (is_404()) {
        $error_template = locate_template('templates/404.php');
        if ($error_template) {
            error_log('404 template found: ' . $error_template);
            return $error_template;
        } else {
            error_log('404 template not found');
        }
    }

    // Default custom template path
    $custom_template_path = 'templates/' . $template_name;
    $custom_template = locate_template($custom_template_path);

    // If a custom template is found, return it
    if ($custom_template) {
        error_log('Custom template found: ' . $custom_template);
        return $custom_template;
    }

    // Log if no custom template was found
    error_log('Custom template not found, using default: ' . $template);

    // Return the original template if no custom template is found
    return $template;
}
add_filter('template_include', 'carrot_template_include');



// Add custom user fields
function add_custom_user_fields($user)
{
?>
    <h3>Extra Profile Information</h3>
    <table class="form-table">
        <tr>
            <th><label for="author_title">Author Title</label></th>
            <td>
                <input type="text" name="author_title" id="author_title" value="<?php echo esc_attr(get_the_author_meta('author_title', $user->ID)); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="full_bio">Full Bio</label></th>
            <td>
                <textarea name="full_bio" id="full_bio" rows="5" cols="30"><?php echo esc_textarea(get_the_author_meta('full_bio', $user->ID)); ?></textarea>
            </td>
        </tr>
    </table>
<?php
}
add_action('show_user_profile', 'add_custom_user_fields');
add_action('edit_user_profile', 'add_custom_user_fields');

// Save custom user fields
function save_custom_user_fields($user_id)
{
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }
    update_user_meta($user_id, 'author_title', $_POST['author_title']);
    update_user_meta($user_id, 'full_bio', $_POST['full_bio']);
}
add_action('personal_options_update', 'save_custom_user_fields');
add_action('edit_user_profile_update', 'save_custom_user_fields');

function get_breadcrumb()
{
    global $post;
    $breadcrumb = '<nav class="breadcrumb">';
    if (!is_home()) {
        $breadcrumb .= '<a href="' . home_url() . '">Home</a> > ';
        if (is_category() || is_single()) {
            $breadcrumb .= '<a href="' . get_permalink(get_option('page_for_posts')) . '">Blog</a> > ';
            if (is_single()) {
                $categories = get_the_category();
                if ($categories) {
                    $category = $categories[0];
                    $breadcrumb .= '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a> > ';
                }
                $breadcrumb .= '<span>' . get_the_title() . '</span>';
            }
        } elseif (is_page()) {
            if ($post->post_parent) {
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                    $parent_id  = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                foreach ($breadcrumbs as $crumb) $breadcrumb .= $crumb . ' > ';
            }
            $breadcrumb .= '<span>' . get_the_title() . '</span>';
        }
    }
    $breadcrumb .= '</nav>';
    return $breadcrumb;
}

function get_offer_button_link()
{
    if (is_front_page()) {
        return '#top';
    } else {
        return home_url('/#top');
    }
}

// Register the REST route
add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/submit-form', array(
        'methods' => 'POST',
        'callback' => 'handle_form_submission',
        'permission_callback' => '__return_true', // Allow public access
    ));
});

// Define the form submission handler
function handle_form_submission(WP_REST_Request $request)
{
    $form_data = $request->get_params();

    $response = wp_remote_post(CRM_WEBHOOK_URL, array(
        'body' => http_build_query($form_data),
        'headers' => array(
            'Content-Type' => 'application/x-www-form-urlencoded'
        ),
    ));

    if (is_wp_error($response)) {
        return new WP_REST_Response('Error sending data to webhook', 500);
    }

    return new WP_REST_Response('Form submitted successfully', 200);
}



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
    $form_data = $request->get_params();
    $webhooks = $form_data['webhooks'] ? json_decode($form_data['webhooks'], true) : [];
    $presets = [
        'cms' => [
            [
                "field" => "fullName",
                "key" => "Name"
            ],
            [
                "field" => "phone",
                "key" => "Phone"
            ],
            [
                "field" => "propertyAddress",
                "key" => "Property Address"
            ],
            [
                "field" => "utm_source",
                "default" => "",
                "key" => "AdWords - Source"
            ],
            [
                "field" => "utm_campaign",
                "default" => "",
                "key" => "AdWords - Campaign"
            ],
            [
                "field" => "utm_term",
                "default" => "",
                "key" => "AdWords - Keyword"
            ],
            [
                "field" => "device",
                "default" => "",
                "key" => "AdWords - Device"
            ],
            [
                "field" => "gclid",
                "default" => "",
                "key" => "Google Click ID"
            ],
            [
                "field" => "page_url",
                "default" => "",
                "key" => "UTM LeadSource"
            ],
            [
                "field" => "email",
                "key" => "Email"
            ]
        ],
        'sgtm' => [
            [
                "field" => "",
                "default" => "lead",
                "key" => "event"
            ],
            [
                "field" => "entry_id",
                "key" => "eventId"
            ],
            [
                "field" => "fullName",
                "key" => "fullName"
            ],
            [
                "field" => "phone",
                "key" => "phone"
            ],
            [
                "field" => "email",
                "key" => "email"
            ],
            [
                "field" => "street",
                "key" => "street"
            ],
            [
                "field" => "city",
                "key" => "city"
            ],
            [
                "field" => "zipcode",
                "key" => "zipcode"
            ],
            [
                "field" => "country",
                "key" => "country"
            ],
            [
                "field" => "country",
                "default" => "United States",
                "key" => "country"
            ],
            [
                "field" => "page_url",
                "key" => "page_url"
            ],
        ],
    ];
    $fieldDatas = [];
    foreach ($webhooks as $webhook) {
        if (!$webhook['url'] || ($webhook['usePreset'] ? empty($presets[$webhook['fieldsPreset']]) : empty($webhook['fieldsMapping']))) {
            continue;
        }
        $fieldData = [];

        if ($webhook['usePreset']) {
            $mapping = $presets[$webhook['fieldsPreset']];
        } else {
            $mapping = $webhook['fieldsMapping'];
        }

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

//---------------------------------------------
// Replacing Carrot imported content variables
//---------------------------------------------

function get_market_city_from_title($title)
{
    // Log the title for debugging
    error_log('Title: ' . $title);

    // Normalize spaces in the title
    $normalized_title = preg_replace('/\s+/', ' ', trim($title));

    // Log the normalized title for debugging
    error_log('Normalized Title: ' . $normalized_title);

    // Extract the word(s) after "in"
    preg_match('/in ([A-Za-z]+)/i', $normalized_title, $matches);
    if (count($matches) === 2) {
        return trim($matches[1]);
    }
    return 'Kansas City'; // Default value if no match found
}

function replace_carrot_variables_in_content($content)
{
    global $post;

    // Ensure it only runs on the main query and the main loop on a single page
    if (is_singular() && in_the_loop() && is_main_query()) {
        $title = get_the_title($post->ID);
        $market_city = get_market_city_from_title($title);

        // Log the extracted market city for debugging
        error_log('Extracted Market City (Content): ' . $market_city);

        // Define replacements with dynamic values
        $replacements = array(
            '[market_city]' => $market_city,
            '[market_state]' => 'MO',
            '[company]' => 'Chris Buys Homes in ' . $market_city,
            '[city]' => $market_city,
            '[state]' => 'MO',
            '[zipcode]' => '64137',
            '[phone]' => '(816) 239-3873',
            '[address]' => '11232 Jackson Ave, Kansas City, MO 64137'
        );

        foreach ($replacements as $placeholder => $replacement) {
            $content = str_replace($placeholder, $replacement, $content);
        }
    }

    return $content;
}

function replace_custom_placeholders_multisite($content)
{
    global $post;

    // Get current site ID for multisite
    $site_id = get_current_blog_id();

    // Fetch Site Settings values for the current site
    $company_name   = get_blog_option($site_id, 'company_name', '');
    $market_city    = get_blog_option($site_id, 'market_city', '');
    $market_state   = get_blog_option($site_id, 'market_state', '');
    $phone          = get_blog_option($site_id, 'phone', '');
    $email          = get_blog_option($site_id, 'email', '');
    $address        = get_blog_option($site_id, 'address', '');
    $street_address = get_blog_option($site_id, 'street_address', '');
    $city           = get_blog_option($site_id, 'city', '');
    $state          = get_blog_option($site_id, 'state', '');
    $zipcode        = get_blog_option($site_id, 'zipcode', '');
    $facebook_link  = get_blog_option($site_id, 'facebook_link', '');

    // Check for per-page overrides
    if (is_object($post)) {
        // Override 'City' if set
        $market_city_override = get_post_meta($post->ID, '_market_city_override', true);
        if (!empty($market_city_override)) {
            $market_city = $market_city_override;
            $city = $market_city_override; // Also override [city]
        }

        // Override 'State' if set
        $market_state_override = get_post_meta($post->ID, '_market_state_override', true);
        if (!empty($market_state_override)) {
            $market_state = $market_state_override;
            $state = $market_state_override; // Also override [state]
        }

        // Override 'Zipcode' if set
        $zipcode_override = get_post_meta($post->ID, '_zipcode_override', true);
        if (!empty($zipcode_override)) {
            $zipcode = $zipcode_override;
        }

        // Override 'Phone' if set
        $phone_override = get_post_meta($post->ID, '_phone_override', true);
        if (!empty($phone_override)) {
            $phone = $phone_override;
        }
    }

    // Define an array of placeholders and their corresponding values
    $placeholders = array(
        '[company]'        => $company_name,
        '[market_city]'    => $market_city,
        '[market_state]'   => $market_state,
        '[phone]'          => $phone,
        '[email]'          => $email,
        '[address]'        => $address,
        '[street_address]' => $street_address,
        '[city]'           => $city,
        '[state]'          => $state,
        '[zipcode]'        => $zipcode,
        '[market_zipcode]' => $zipcode,
        '[facebook_link]'  => $facebook_link,
    );

    // Replace each placeholder with its corresponding value in the content
    foreach ($placeholders as $placeholder => $value) {
        $content = str_replace($placeholder, $value, $content);
    }

    return $content;
}

// Add meta box to the page editor
function add_market_override_meta_box()
{
    add_meta_box(
        'market_override_meta_box', // ID
        'Market Overrides',         // Title
        'market_override_meta_box_callback', // Callback function
        'page',                     // Post type (pages)
        'side'                      // Context (sidebar)
    );
}
add_action('add_meta_boxes', 'add_market_override_meta_box');

// Display the meta box
// Display the meta box with placeholders
function market_override_meta_box_callback($post)
{
    // Add a nonce field for security
    wp_nonce_field('save_market_override_meta_box_data', 'market_override_meta_box_nonce');

    // Retrieve existing values from the post meta, if any
    $market_city   = get_post_meta($post->ID, '_market_city_override', true);
    $market_state  = get_post_meta($post->ID, '_market_state_override', true);
    $zipcode       = get_post_meta($post->ID, '_zipcode_override', true);
    $phone         = get_post_meta($post->ID, '_phone_override', true);

    // Retrieve site-wide values
    $site_id = get_current_blog_id();
    $default_market_city   = get_blog_option($site_id, 'market_city', '');
    $default_market_state  = get_blog_option($site_id, 'market_state', '');
    $default_zipcode       = get_blog_option($site_id, 'zipcode', '');
    $default_phone         = get_blog_option($site_id, 'phone', '');

    // Output the fields with placeholders
?>
    <p>
        <label for="market_city_override">City:</label><br />
        <input type="text" id="market_city_override" name="market_city_override" value="<?php echo esc_attr($market_city); ?>" placeholder="<?php echo esc_attr($default_market_city); ?>" />
    </p>
    <p>
        <label for="market_state_override">State:</label><br />
        <input type="text" id="market_state_override" name="market_state_override" value="<?php echo esc_attr($market_state); ?>" placeholder="<?php echo esc_attr($default_market_state); ?>" />
    </p>
    <p>
        <label for="zipcode_override">Zipcode:</label><br />
        <input type="text" id="zipcode_override" name="zipcode_override" value="<?php echo esc_attr($zipcode); ?>" placeholder="<?php echo esc_attr($default_zipcode); ?>" />
    </p>
    <p>
        <label for="phone_override">Phone:</label><br />
        <input type="text" id="phone_override" name="phone_override" value="<?php echo esc_attr($phone); ?>" placeholder="<?php echo esc_attr($default_phone); ?>" />
    </p>
<?php
}

// Save the meta box data
function save_market_override_meta_box_data($post_id)
{
    // Check if nonce is set
    if (!isset($_POST['market_override_meta_box_nonce'])) {
        return;
    }

    // Verify the nonce
    if (!wp_verify_nonce($_POST['market_override_meta_box_nonce'], 'save_market_override_meta_box_data')) {
        return;
    }

    // Check for autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check user permissions
    if ('page' === $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return;
        }
    }

    // Save or delete the 'City' override
    if (isset($_POST['market_city_override'])) {
        $market_city = sanitize_text_field($_POST['market_city_override']);
        if (!empty($market_city)) {
            update_post_meta($post_id, '_market_city_override', $market_city);
        } else {
            delete_post_meta($post_id, '_market_city_override');
        }
    }

    // Save or delete the 'State' override
    if (isset($_POST['market_state_override'])) {
        $market_state = sanitize_text_field($_POST['market_state_override']);
        if (!empty($market_state)) {
            update_post_meta($post_id, '_market_state_override', $market_state);
        } else {
            delete_post_meta($post_id, '_market_state_override');
        }
    }

    // Save or delete the 'Zipcode' override
    if (isset($_POST['zipcode_override'])) {
        $zipcode = sanitize_text_field($_POST['zipcode_override']);
        if (!empty($zipcode)) {
            update_post_meta($post_id, '_zipcode_override', $zipcode);
        } else {
            delete_post_meta($post_id, '_zipcode_override');
        }
    }

    // Save or delete the 'Phone' override
    if (isset($_POST['phone_override'])) {
        $phone = sanitize_text_field($_POST['phone_override']);
        if (!empty($phone)) {
            update_post_meta($post_id, '_phone_override', $phone);
        } else {
            delete_post_meta($post_id, '_phone_override');
        }
    }
}
add_action('save_post', 'save_market_override_meta_box_data');



// Apply the filter to both title and content
add_filter('the_content', 'replace_custom_placeholders_multisite');
add_filter('the_title', 'replace_custom_placeholders_multisite');

// Register custom query variable
function add_custom_query_vars($vars)
{
    $vars[] = 'custom_path';  // Register 'custom_path' as a valid query variable
    return $vars;
}
add_filter('query_vars', 'add_custom_query_vars');

// Add rewrite rule for custom paths with conditional multisite support
function dynamic_landing_page_rewrite_rules()
{
    global $wp_rewrite;

    if (is_multisite() && ! is_main_site()) {
        // Multisite sub-site: include blog prefix
        add_rewrite_rule(
            '^ws/(.+)/?',
            'index.php?custom_path=$matches[1]',
            'top',
            true // Enable blog prefix
        );
    } else {
        // Main site or single site: no blog prefix
        add_rewrite_rule(
            '^ws/(.+)/?',
            'index.php?custom_path=$matches[1]',
            'top'
        );
    }
}
add_action('init', 'dynamic_landing_page_rewrite_rules');

// Handle dynamic path redirection
function handle_dynamic_path_redirect()
{
    // Get the custom path from the URL
    $custom_path = get_query_var('custom_path');

    // Debugging: Log the custom_path to ensure it's being captured
    error_log('Custom Path: ' . ($custom_path ? $custom_path : 'No path'));

    // Check if the custom path is empty or if it's a request for a static asset
    if (empty($custom_path) || preg_match('/\.(?:css|js|png|jpg|jpeg|gif|ico|svg|map)$/', $custom_path)) {
        error_log('No custom path found or static file request');
        return;  // Exit early if no custom path is found or it's a static file request
    }

    // Query the database for a page with a matching custom URL slug
    $args = array(
        'post_type' => 'page',
        'meta_query' => array(
            array(
                'key'     => 'custom_url_slugs',  // This is the ACF field name
                'value'   => $custom_path,        // Match the custom path from the URL
                'compare' => 'LIKE'
            )
        )
    );

    // Run the query
    $query = new WP_Query($args);

    // Check if a page was found
    if ($query->have_posts()) {
        $page = $query->posts[0];  // Get the first matching page

        // Set up the post data to render the page
        global $wp_query;
        $wp_query->post = $page;
        $wp_query->queried_object = $page;
        $wp_query->is_page = true;
        $wp_query->is_singular = true;
        $wp_query->is_404 = false;

        // Ensure Gutenberg blocks are parsed correctly
        $parsed_content = parse_blocks($page->post_content);
        $rendered_content = '';
        foreach ($parsed_content as $block) {
            $rendered_content .= render_block($block);
        }

        // Output the header with meta tags before rendering content
        carrot_get_header();

        // Output the rendered content
        echo $rendered_content;

        // Output the footer after the content
        carrot_get_footer();

        exit;
    } else {
        // If no matching page is found, return a 404 error
        global $wp_query;
        $wp_query->is_404 = true;
        status_header(404);

        // Fix: Check if get_404_template() returns a valid path before including
        $template_404 = get_404_template();
        if ($template_404) {
            include($template_404);
        } else {
            // If no 404 template is found, output a default message or handle accordingly
            echo '404 Not Found';
        }

        exit;
    }
}
add_action('template_redirect', 'handle_dynamic_path_redirect');

// Function to flush rewrite rules for all sites (use cautiously)
function multisite_flush_rewrite_rules()
{
    if (is_multisite()) {
        $sites = get_sites();
        foreach ($sites as $site) {
            switch_to_blog($site->blog_id);
            flush_rewrite_rules();
            restore_current_blog();
        }
    } else {
        flush_rewrite_rules();
    }
}
// Hook into 'admin_init' to avoid performance issues on every page load
add_action('admin_init', 'multisite_flush_rewrite_rules');
