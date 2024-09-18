<?php
$site_id = get_current_blog_id();
$market_city = get_blog_option($site_id, 'market_city', '');
$market_code = get_blog_option($site_id, 'market_code', '');

$phone_numbers = [
    'sf'  => '(510) 283-9871',
    'stl' => '(314) 887-8043',
    'kc'  => '(816) 720-7760',
    'det' => '(313) 217-9851',
    'cle' => '(216) 677-2169',
    'ind' => '(317) 526-4712',
];

$phoneNumber = isset($phone_numbers[$market_code]) ? $phone_numbers[$market_code] : '';

carrot_get_header();
?>

<div id="primary" class="content-area">
    <?php carrot_get_template_part('template-parts/hero'); ?>

    <div class="post-wrapper">
        <main id="main" class="site-main">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('large');
                    }
                    the_content();
                    ?>
                </div>
            </article>
        </main>
        <!-- Sidebar -->
        <?php carrot_get_template_part('template-parts/sidebar'); ?>
    </div>
</div>

<?php
// Include footer
carrot_get_footer();
?>