<?php
global $no_header;
$site_data = cbh_get_site_data();

$market_code = $site_data['market_code'];
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php
    // List of production blog names
    $production_blog_names = array(
        'Chris Buys Homes in Indianapolis',
        'Chris Buys Homes in Kansas City',
        'Chris Buys Homes in St. Louis',
        'Chris Buys Homes in Detroit',
        'Chris Buys Homes in Cleveland',
        'John Buys Bay Area Houses'
    );

    // Map markets to GTM IDs
    $market_gtm_map = array(
        'sf'  => 'GTM-NJ6LP74',
        'stl' => 'GTM-PQTW9BQ',
        'kc'  => 'GTM-K4Q5CKB',
        'det' => 'GTM-T75JTFR',
        'cle' => 'GTM-MFXJR55',
        'ind' => 'GTM-MPG2VCR',
    );

    // Determine if the environment is production
    $current_blog_name = $site_data['company_name'];
    $is_production = in_array($current_blog_name, $production_blog_names);

    // Check if the market code has a corresponding GTM ID and is in production
    if ($is_production && !empty($market_code) && array_key_exists($market_code, $market_gtm_map)) {
        $gtm_id = $market_gtm_map[$market_code];
    ?>
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
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', '<?php echo $gtm_id; ?>');
        </script>
        <!-- End Google Tag Manager -->
    <?php
    }
    ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>


<style>
    :root {
        <?php echo $market_code === 'cle' ? '--set-logo-width-mobile: 10.25rem; --set-logo-width-desktop: 19.125rem;' : ''; ?><?php echo $market_code === 'sf' ? '--set-logo-width-mobile: 10.625rem; --set-logo-width-desktop: 20rem;' : ''; ?>
    }
</style>


<body <?php body_class(); ?> <?php if ($market_code == 'det' || $market_code == 'cle' || $market_code == 'ind') : ?>style="font-family: Source Sans Pro, sans-serif !important;" <?php endif; ?>>
    <?php wp_body_open(); ?>

    <?php
    // Check if the GTM ID is set and the environment is production
    if ($is_production && !empty($gtm_id)) :
    ?>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $gtm_id; ?>"
                height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
    <?php endif; ?>

    <?php if (!$no_header): ?>
        <header class="cb-header">
            <div class="cb-header__inner">
                <div class="cb-header__logo">
                    <?php if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    } ?>
                </div>
                <nav class="cb-header__mobile-nav">
                    <div class="cb-telephone-container">
                        <svg viewBox="0 0 100 100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" version="1.1" style="transform: translateY(6%)" class="cb-triangle cb-triangle-top">
                            <polygon class="hl-triangle-poly-1" fill="#ff651e" points="0,94 0,100 100,100 100,94 100,0"></polygon>
                        </svg>
                        <div class="cb-telephone-text">
                            <span class="cb-contact-phone-text">Call Us!</span>
                            <span itemprop="telephone">
                                <b><a href="tel: <?php echo $site_data['phone']; ?>" style="color: #02bdfc;"><?php echo $site_data['phone']; ?></a></b>
                            </span>
                        </div>
                    </div>
                    <div class="cb-header____links">
                        <?php if ($market_code === 'kc'): ?>
                            <a href="<?php echo site_url() ?>/get-a-cash-offer-today/" class="cb-header__mobile-nav-link">Get A Cash Offer Today</a>

                        <?php elseif (in_array($market_code, ['stl', 'sf'])): ?>
                            <a href="<?php echo site_url() ?>/get-a-cash-offer-today/" class="cb-header__mobile-nav-link">Get A Cash Offer in 7 Minutes</a>

                        <?php elseif ($market_code === 'ind'): ?>
                            <a href="<?php echo site_url() ?>/get-a-cash-offer-today/" class="cb-header__mobile-nav-link">Get A Cash Offer in 7 Minutes</a>
                            <a href="<?php echo site_url() ?>/our-company/" class="cb-header__mobile-nav-link">Our Company</a>

                        <?php elseif (in_array($market_code, ['cle', 'det'])): ?>
                            <a href="<?php echo site_url() ?>/get-a-cash-offer-today/" class="cb-header__mobile-nav-link">Get Your Cash Offer</a>
                            <a href="<?php echo site_url() ?>/contact-us/" class="cb-header__mobile-nav-link">Contact Us</a>

                        <?php endif; ?>
                    </div>
                    <button type="button" class="cb-header__mobile-toggler">
                        Menu&nbsp;▾
                    </button>
                </nav>
                <nav class="cb-header__menu-block">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'cb-header__menu',
                        'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                    ));
                    ?>
                </nav>
            </div>
        </header>
    <?php endif; ?>