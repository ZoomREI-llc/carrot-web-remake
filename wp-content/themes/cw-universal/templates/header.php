<?php
// Determine the environment based on the domain
$hostname = $_SERVER['HTTP_HOST'];
$ga4_id = '';
$gtm_id = 'GTM-TKZC2HCZ'; // Shared GTM ID
$gtm_auth = '';
$gtm_preview = '';
$gtm_cookies_win = '';

// Set up the GA4 ID and GTM parameters based on the environment
if ($hostname === 'doctorhomes.com') {
    // Production environment
    $ga4_id = 'G-H3Y9EBZKYD';
} elseif ($hostname === 'remix.chrisbuyshomes.com') {
    // Staging environment
    $ga4_id = 'G-5LFED51EBS';
    $gtm_auth = 'uJqSmKQP7BdOHmdQ4lkTxg'; // Staging GTM auth token
    $gtm_preview = 'env-32'; // Staging GTM environment ID
    $gtm_cookies_win = 'x';
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Start Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ga4_id; ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', '<?php echo $ga4_id; ?>');
    </script>
    <!-- End Google tag (gtag.js) -->

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl +
                '<?php
                    if ($hostname === "remix.chrisbuyshomes.com") {
                        echo "&gtm_auth=$gtm_auth&gtm_preview=$gtm_preview&gtm_cookies_win=$gtm_cookies_win";
                    }
                    ?>';
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', '<?php echo $gtm_id; ?>');
    </script>
    <!-- End Google Tag Manager -->

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(''); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $gtm_id; ?><?php
                                                                                        if ($hostname === "remix.chrisbuyshomes.com") {
                                                                                            echo "&gtm_auth=$gtm_auth&gtm_preview=$gtm_preview&gtm_cookies_win=$gtm_cookies_win";
                                                                                        }
                                                                                        ?>"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <?php wp_body_open(); ?>



    <div class="cwu-header__number-one">
        <img src="<?php echo get_template_directory_uri() . '/src/assets/menus/unitedstates_1.svg'; ?>" class="cw-header__flag" alt="Flag Icon" width="30" height="30">
        <p><strong>America’s</strong> Most Trusted Cash House Buyers Since 2000</p>
    </div>
    <header class="cwu-header">
        <div class="grid-container">
            <div class="cwu-header__content">
                <?= get_custom_logo(); ?>

                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'container' => '',
                        'container_class' => '',
                        'menu_class' => 'cwu-header__menu',
                        'walker' => new Desktop_Walker_Nav_Menu()
                    ));
                ?>
                <a class="call-btn" href="tel:<?= get_blog_option(get_current_blog_id(), 'phone', '') ?>">
                    <div class="cwu-header__phone-number">
                        <span class="cwu-header__phone--text">
                            <span class="cwu-header__phone--icon">
                                <img src="<?php echo get_template_directory_uri() . '/src/assets/menus/telephone_1.svg'; ?>" alt="Phone Icon">
                            </span>
                            Call Us On
                        </span>
                        <span class="cwu-header__phone--number"><?= get_blog_option(get_current_blog_id(), 'phone', '') ?></span>
                    </div>
                    <div class="contact-phone">
                        <img src="<?php echo get_template_directory_uri() . '/src/assets/menus/phone-icon.svg'; ?>" alt="Phone Icon">
                    </div>
                </a>
                <div class="cwu-header__btn">
                    <a href="/#cw-form" class="btn btn--small">Get My Offer</a>
                </div>

                <button id="mobile-menu-button" class="cwu-header__burger mobile-menu-button">
                    <img src="<?php echo get_template_directory_uri() . '/src/assets/menus/mobile-menu-icon.svg'; ?>" alt="Mobile Navigation Menu">
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="mobile-menu">
            <button id="close-mobile-menu" class="close-mobile-menu">
                <img src="<?php echo get_template_directory_uri() . '/src/assets/menus/close-mobile-menu-icon.svg'; ?>" alt="Close Mobile Navigation Menu">
            </button>
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary-menu',
                    'container'      => '',
                    'menu_class'     => 'mobile-nav-menu',
                    'walker'         => new Mobile_Walker_Nav_Menu(),
                    'add_polygon'    => true,
                ));
            ?>
            <a href="<?php echo get_offer_button_link(); ?>" class="btn get-offer-button">
                Get My Offer <img src="<?php echo get_template_directory_uri() . '/src/assets/menus/cta-arrow.svg'; ?>" alt="Get My Offer">
            </a>
        </div>
    </header>