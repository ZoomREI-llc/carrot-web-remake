<?php
    define('GOOGLE_MAPS_API_KEY', 'AIzaSyCwwLF50kEF6wS1rTEqTDPfTXcSlF9REuI');
    define('CRM_WEBHOOK_URL', 'https://workflow-automation.podio.com/catch/2kt203ir6i3uk64');
// Enqueue Scripts and Styles
function cw_universal_enqueue_assets()
{
    $style_version = filemtime(get_template_directory() . '/dist/style.css');
    $script_version = filemtime(get_template_directory() . '/src/js/script.js');

    wp_enqueue_style('cw-universal-style', get_template_directory_uri() . '/dist/style.css', array(), $style_version);
    wp_enqueue_script('interactivity-api', get_template_directory_uri() . '/src/js/script.js', array(), $script_version, true);

    if (!is_page_template('templates/landing-page.php')) {
        wp_enqueue_script('cw-universal-menu', get_template_directory_uri() . '/src/js/menu.js', array(), null, true);
        wp_enqueue_script('cw-universal-mobile-menu', get_template_directory_uri() . '/src/js/mobile-menu.js', array(), null, true);
    }

    wp_enqueue_script('lead-souce', get_template_directory_uri() . '/src/js/lead-source.js', array(), null, true);
    wp_enqueue_script('utm-persister', get_template_directory_uri() . '/src/js/utm-persister.js', array(), null, true);
    wp_enqueue_script('gf-full-address', get_template_directory_uri() . '/src/js/full-address-field.js', array(), null, true);
    wp_enqueue_script('cw-universal-events-handler', get_template_directory_uri() . '/src/js/events-handler.js', array(), null, true);



    if (is_single()) {
        wp_enqueue_script('share-bar-js', get_template_directory_uri() . '/src/js/share-bar.js', array(), '1.0.0', true);
    }

    wp_localize_script('interactivity-api', 'formConfig', array(
        'googleMapsApiKey' => GOOGLE_MAPS_API_KEY,
        'crmWebhookUrl' => CRM_WEBHOOK_URL,
        'storagePrefix' => 'cw-universal_',
    ));
}
add_action('wp_enqueue_scripts', 'cw_universal_enqueue_assets');

// Theme Support
function cw_universal_theme_support()
{
    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');
    add_theme_support('editor-color-palette');
    add_editor_style('dist/style.css');
    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
    ));
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'cw_universal_theme_support');

function cw_universal_custom_js_customizer($wp_customize)
{
    // Add Section for Custom JavaScript
    $wp_customize->add_section('custom_js_section', array(
        'title'       => __('Custom JavaScript', 'cw_universal'),
        'priority'    => 160,
    ));
    
    // Add Setting for Header JS Code
    $wp_customize->add_setting('custom_header_js_code', array(
        'default'           => '',
        'sanitize_callback' => 'cw_universal_sanitize_js', // Custom sanitization
    ));
    
    // Add Control for Header JS Code (textarea)
    $wp_customize->add_control('custom_header_js_code', array(
        'label'    => __('Custom JavaScript for Header', 'cw_universal'),
        'section'  => 'custom_js_section',
        'settings' => 'custom_header_js_code',
        'type'     => 'textarea',
    ));
    
    // Add Setting for Footer JS Code
    $wp_customize->add_setting('custom_footer_js_code', array(
        'default'           => '',
        'sanitize_callback' => 'cw_universal_sanitize_js', // Custom sanitization
    ));
    
    // Add Control for Footer JS Code (textarea)
    $wp_customize->add_control('custom_footer_js_code', array(
        'label'    => __('Custom JavaScript for Footer', 'cw_universal'),
        'section'  => 'custom_js_section',
        'settings' => 'custom_footer_js_code',
        'type'     => 'textarea',
    ));
}
add_action('customize_register', 'cw_universal_custom_js_customizer');

// Sanitization function to allow <script> tags
function cw_universal_sanitize_js($input)
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
function cw_universal_output_header_js()
{
    $custom_header_js = get_theme_mod('custom_header_js_code');
    if (!empty($custom_header_js)) {
        echo $custom_header_js;
    }
}
add_action('wp_head', 'cw_universal_output_header_js');

// Output custom JS for the footer
function cw_universal_output_footer_js()
{
    $custom_footer_js = get_theme_mod('custom_footer_js_code');
    if (!empty($custom_footer_js)) {
        echo $custom_footer_js;
    }
}
add_action('wp_footer', 'cw_universal_output_footer_js');

// Register Menus
function cw_universal_register_menus()
{
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu'),
        'footer-company-menu' => __('Footer Company Menu'),
        'footer-locations-menu' => __('Footer Locations Menu'),
        'footer-resources-menu' => __('Footer Resources Menu'),
        'footer-legal-menu' => __('Footer Legal Menu'),
    ));
}
add_action('init', 'cw_universal_register_menus');


// Custom Desktop Navigation Walker
class Desktop_Walker_Nav_Menu extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = null) {
    }
    
    public function end_lvl(&$output, $depth = 0, $args = null) {
    }
    
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $class_names = join(' ', array('cw-header__menu--link'));
        $attributes = ' href="' . esc_url($item->url) . '" class="' . esc_attr($class_names) . '"';
        $output .= '<a' . $attributes . '>' . esc_html($item->title) . '</a>';
    }
    
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= '';
    }
}
// Custom Mobile Navigation Walker
class Mobile_Walker_Nav_Menu extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        if(!$item){
            return;
        }
        $polygon_icon_url = get_template_directory_uri() . '/src/assets/menus/polygon-1.svg';
        $output .= '<li class="menu-item menu-item-' . $item->ID . '">';
        $output .= '<div class="menu-item-title"><a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
        if (is_array($item->classes) && in_array('menu-item-has-children', $item->classes)) {
            $output .= '<div class="polygon-icon-wrapper"><img class="polygon-icon" src="' . $polygon_icon_url . '"></div></div>';
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
function cw_universal_get_template_part($slug, $name = null)
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
function cw_universal_get_header($name = null)
{
    $template = $name ? locate_template("templates/header-{$name}.php") : locate_template("templates/header.php");
    if ($template) {
        load_template($template);
    }
}

function cw_universal_get_footer($name = null)
{
    $template = $name ? locate_template("templates/footer-{$name}.php") : locate_template("templates/footer.php");
    if ($template) {
        load_template($template);
    }
}

// Template Part Loading with Fallback
function cw_universal_get_template_part_with_fallback($slug, $name = null)
{
    $templates = array();

    if (isset($name)) {
        $templates[] = "templates/{$slug}-{$name}.php";
    }
    $templates[] = "templates/{$slug}.php";
    $templates[] = "{$slug}.php";

    $found_template = locate_template($templates, true, false);

    if (!$found_template) {
        get_template_part($slug, $name);
    }
}

// Template Include Filter
function cw_universal_template_include($template)
{
    // Log the current template being processed
    error_log('Current template: ' . $template);

    if (is_home()) {
        error_log('Using index.php for the front page or blog home page');
        return get_template_directory() . '/index.php';
    }

    // Prioritize landing page template without other checks overriding it
    if (is_page_template('templates/landing-page.php')) {
        $landing_template = locate_template('templates/landing-page.php');
        if ($landing_template) {
            error_log('Landing page template located: ' . $landing_template);
            return $landing_template; // Return and stop further processing
        }
    }

    // Specific checks for different template types
    if (is_single()) {
        $single_template = locate_template('templates/single.php');
        if ($single_template) {
            error_log('Single post template found: ' . $single_template);
            return $single_template;
        }
    }

    if (is_page()) {
        global $post;

        // Check if the page is the Privacy Policy or Terms of Use page
        if ($post->ID == 3 || $post->ID == 507) {
            $legal_template = locate_template('templates/legal.php');
            if ($legal_template) {
                error_log('Legal page template found: ' . $legal_template);
                return $legal_template;
            }
        }

        // If no special page template applies, use the general page template
        $page_template = locate_template('templates/page.php');
        if ($page_template) {
            error_log('General page template found: ' . $page_template);
            return $page_template;
        }
    }

    // Other template checks (author, category, etc.)
    if (is_author()) {
        $author_template = locate_template('templates/author.php');
        if ($author_template) {
            error_log('Author template found: ' . $author_template);
            return $author_template;
        }
    }

    if (is_category()) {
        $category_template = locate_template('templates/category.php');
        if ($category_template) {
            error_log('Category template found: ' . $category_template);
            return $category_template;
        }
    }

    if (is_tag()) {
        $tag_template = locate_template('templates/tag.php');
        if ($tag_template) {
            error_log('Tag template found: ' . $tag_template);
            return $tag_template;
        }
    }

    if (is_archive()) {
        $archive_template = locate_template('templates/archive.php');
        if ($archive_template) {
            error_log('Archive template found: ' . $archive_template);
            return $archive_template;
        }
    }

    if (is_search()) {
        $search_template = locate_template('templates/search.php');
        if ($search_template) {
            error_log('Search template found: ' . $search_template);
            return $search_template;
        }
    }

    if (is_404()) {
        $error_template = locate_template('templates/404.php');
        if ($error_template) {
            error_log('404 template found: ' . $error_template);
            return $error_template;
        }
    }

    // Log if no custom template was found
    error_log('No specific template found, using default: ' . $template);

    // Return the original template if no custom template is found
    return $template;
}

add_filter('template_include', 'cw_universal_template_include');

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
        $breadcrumb .= '<a href="' . home_url() . '">Home</a>';
        if (is_category() || is_single()) {
            $breadcrumb .= '<a href="' . get_permalink(get_option('page_for_posts')) . '">Blog</a>';
            if (is_single()) {
                $categories = get_the_category();
                if ($categories) {
                    $category = $categories[0];
                    $breadcrumb .= '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
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
                foreach ($breadcrumbs as $crumb) $breadcrumb .= $crumb;
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
        return '#cw-form';
    } else {
        return home_url('/#cw-form');
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
        return new WP_REST_Response($response->get_error_message(), $response->get_error_code());
    }

    return new WP_REST_Response('Form submitted successfully', 200);
}

// // Remove category base
// // Remove category base
// function custom_remove_category_base()
// {
//     // Remove the category base from permalinks
//     add_filter('category_rewrite_rules', 'custom_category_rewrite_rules');
//     add_filter('request', 'custom_category_request');
// }
// add_action('init', 'custom_remove_category_base');

// function custom_category_rewrite_rules($category_rewrite)
// {
//     $category_rewrite = array();
//     $categories = get_categories(array('hide_empty' => false));
//     foreach ($categories as $category) {
//         $category_nicename = $category->slug;
//         if ($category->parent == $category->cat_ID) {
//             $category->parent = 0;
//         } elseif ($category->parent != 0) {
//             $category_nicename = get_category_parents($category->parent, false, '/', true) . $category_nicename;
//         }
//         $category_rewrite['blog/' . $category_nicename . '/?$'] = 'index.php?category_name=' . $category->slug;
//         $category_rewrite['blog/' . $category_nicename . '/page/?([0-9]{1,})/?$'] = 'index.php?category_name=' . $category->slug . '&paged=$matches[1]';
//         $category_rewrite['blog/' . $category_nicename . '/(.*)$'] = 'index.php?category_name=' . $category->slug . '&attachment=$matches[1]';
//     }
//     return $category_rewrite;
// }

// function custom_category_request($request)
// {
//     if (isset($request['category_name'])) {
//         $category_name = explode('/', $request['category_name']);
//         if (isset($category_name[1])) {
//             $request['category_name'] = $category_name[1];
//         }
//     }
//     return $request;
// }

function add_table_of_contents($content) {
    if (empty($content)) {
        return $content;
    }
    
    preg_match_all('/<h2>(.*?)<\/h2>/', $content, $matches);
    
    $table_of_contents = [];
    
    if (!empty($matches[1])) {
        foreach ($matches[1] as $index => $heading_text) {
            $id = sanitize_title($heading_text);
            $table_of_contents[] = '<li><a href="#' . $id . '">' . esc_html($heading_text) . '</a></li>';
            
            $content = str_replace(
                $matches[0][$index],
                '<h2 id="' . esc_attr($id) . '">' . $heading_text . '</h2>',
                $content
            );
        }
    }
    
    if (!empty($table_of_contents)) {
        $toc_html = '<div class="table-of-contents"><h3>Table of Contents</h3><ul>' . implode('', $table_of_contents) . '</ul></div>';
        $content = $toc_html . $content;
    }
    
    return $content;
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
add_filter('render_block', 'replace_custom_placeholders_multisite', 10, 2);

function cwu_get_site_data()
{
    static $site_data = null;
    if ($site_data !== null) {
        return $site_data;
    }
    
    $site_id = get_current_blog_id();
    $site_data = array(
        'phone' => get_blog_option($site_id, 'phone', ''),
        'company_name' => get_blog_option($site_id, 'company_name', ''),
        'address' => get_blog_option($site_id, 'address', ''),
        'street_address' => get_blog_option($site_id, 'street_address', ''),
        'city' => get_blog_option($site_id, 'city', ''),
        'state' => get_blog_option($site_id, 'state', ''),
        'zipcode' => get_blog_option($site_id, 'zipcode', ''),
        'email' => get_blog_option($site_id, 'email', ''),
        'facebook_link' => get_blog_option($site_id, 'facebook_link', ''),
        'twitter_link' => get_blog_option($site_id, 'twitter_link', ''),
        'youtube_link' => get_blog_option($site_id, 'youtube_link', ''),
        'linkedin_link' => get_blog_option($site_id, 'linkedin_link', ''),
        'instagram_link' => get_blog_option($site_id, 'instagram_link', ''),
        'pinterest_link' => get_blog_option($site_id, 'pinterest_link', ''),
        'zillow_link' => get_blog_option($site_id, 'zillow_link', ''),
        'market_code' => get_blog_option($site_id, 'market_code', ''),
    );
    
    return $site_data;
}

// Add Custom Paths Meta Box
function add_custom_paths_meta_box()
{
    add_meta_box(
        'custom_paths_meta_box',
        'Custom Paths',
        'custom_paths_meta_box_callback',
        'page',
        'side'
    );
}
add_action('add_meta_boxes', 'add_custom_paths_meta_box');

function custom_paths_meta_box_callback($post)
{
    wp_nonce_field('save_custom_paths', 'custom_paths_nonce');
    $custom_slugs = get_post_meta($post->ID, 'custom_slugs', true);
    
    // Instructions: Store the full path including 'ws/' prefix in each line.
    // Example:
    // ws/google/sf/1
    // ws/google/sf/1/2/3
    echo '<p>Enter one or more full paths that map to this page, one per line.<br>';
    echo 'Include the "ws/" prefix. For example:<br><code>ws/google/sf/1</code><br>';
    echo 'If multiple: <br><code>ws/google/sf/1</code><br><code>ws/google/sf/1/2</code></p>';
    echo '<textarea name="custom_slugs" style="width:100%;height:80px;">' . esc_textarea($custom_slugs) . '</textarea>';
}

function save_custom_paths($post_id)
{
    if (!isset($_POST['custom_paths_nonce'])) return;
    if (!wp_verify_nonce($_POST['custom_paths_nonce'], 'save_custom_paths')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if ('page' === $_POST['post_type'] && !current_user_can('edit_page', $post_id)) return;
    
    $custom_slugs = isset($_POST['custom_slugs']) ? sanitize_textarea_field($_POST['custom_slugs']) : '';
    $slugs = preg_split('/[\r\n,]+/', $custom_slugs);
    $slugs = array_map('trim', $slugs);
    $slugs = array_filter($slugs);
    $final_slugs = implode("\n", $slugs);
    update_post_meta($post_id, 'custom_slugs', $final_slugs);
}
add_action('save_post', 'save_custom_paths');

// Register custom query variable
function add_custom_query_vars($vars)
{
    $vars[] = 'custom_path';
    return $vars;
}
add_filter('query_vars', 'add_custom_query_vars');

// Add rewrite rule for custom paths
function dynamic_landing_page_rewrite_rules()
{
    if (is_multisite() && !is_main_site()) {
        add_rewrite_rule(
            '^ws/(.+)/?',
            'index.php?custom_path=$matches[1]',
            'top'
        );
    } else {
        add_rewrite_rule(
            '^ws/(.+)/?',
            'index.php?custom_path=$matches[1]',
            'top'
        );
    }
}
add_action('init', 'dynamic_landing_page_rewrite_rules');

// Handle dynamic path resolution early in parse_request
function handle_custom_path_in_parse_request($wp)
{
    if (isset($wp->query_vars['custom_path']) && !empty($wp->query_vars['custom_path'])) {
        $custom_path = $wp->query_vars['custom_path'];
        
        // If it's a static file request, ignore
        if (preg_match('/\.(css|js|png|jpg|jpeg|gif|ico|svg|map)$/', $custom_path)) {
            return;
        }
        
        $exact_check_slug = 'ws/' . $custom_path;
        
        $args = array(
            'post_type' => 'page',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key'     => 'custom_slugs',
                    'value'   => $exact_check_slug,
                    'compare' => 'LIKE'
                )
            )
        );
        
        $query = new WP_Query($args);
        $matched_page = null;
        
        if ($query->have_posts()) {
            foreach ($query->posts as $page) {
                $stored_slugs = get_post_meta($page->ID, 'custom_slugs', true);
                if ($stored_slugs) {
                    $lines = preg_split('/[\r\n]+/', $stored_slugs);
                    $lines = array_map('trim', $lines);
                    $lines = array_filter($lines);
                    
                    if (in_array($exact_check_slug, $lines)) {
                        $matched_page = $page;
                        break;
                    }
                }
            }
        }
        
        if (!$matched_page) {
            return; // no exact match, let it 404
        }
        
        $page_uri = get_page_uri($matched_page->ID);
        unset($wp->query_vars['custom_path']);
        $wp->query_vars['page_id'] = $matched_page->ID;
        $wp->query_vars['pagename'] = $page_uri;
        $wp->query_vars['error'] = '';
    }
}

add_action('parse_request', 'handle_custom_path_in_parse_request', 1);

// Function to flush rewrite rules for multisite if needed
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
add_action('admin_init', 'multisite_flush_rewrite_rules');