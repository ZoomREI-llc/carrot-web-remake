<?php
/*
Template Name: Landing Page
*/
?>

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

ob_start();
while (have_posts()) : the_post();
    the_content();
endwhile;
$the_content = ob_get_clean();
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
    <main id="main" class="site-main" role="main">
        <div class="page-container">
            <?= $the_content ?>
        </div>
    </main>

    <div class="footer-disclaimer">
        <hr style="border-top: 1px solid #CCCCCC;" /> <!-- Separator line -->
        <p>The content provided on this website is intended for informational purposes only and does not constitute an offer to buy or a solicitation to sell property. All representations regarding potential transactions are preliminary and subject to change. No content on this site should be interpreted as a binding promise or guarantee of a specific outcome. Each property purchase will be subject to individual negotiation and the execution of a definitive agreement, the terms of which may vary. We make no warranties regarding the accuracy, completeness, legality, or reliability of any information offered on this website. Sellers are advised to conduct their own due diligence and consult with professional advisors prior to entering into any transaction with us.</p>
    </div>

    <style>
        .footer-disclaimer hr {
            margin: 1rem 0;
        }

        .footer-disclaimer p {
            font-size: 0.75em;
            /*color: #666;*/
            padding: 0 1rem;
            line-height: 1rem;
            text-align: center;
        }
    </style>

    <?php wp_footer(); ?>
</body>

</html>