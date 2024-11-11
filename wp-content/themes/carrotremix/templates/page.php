<?php
// Include the header

ob_start();
while (have_posts()) : the_post();
    the_content();
endwhile;
$the_content = ob_get_clean();

carrot_get_header();

$site_id = get_current_blog_id();
$market_code = get_blog_option($site_id, 'market_code', '');

?>
<main id="main" class="site-main" role="main" <?php if ($market_code == 'det' || $market_code == 'cle' || $market_code == 'ind') : ?>style="font-family: Source Sans Pro, sans-serif !important;" <?php endif; ?>>
    <div class="page-container">
        <?= $the_content ?>
    </div>
</main>

<?php
// Include the footer
carrot_get_footer();
