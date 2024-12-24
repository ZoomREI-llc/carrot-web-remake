<?php

/**
 * single.php
 * 
 * Main template for displaying single posts.
 */

$the_content = [
    do_shortcode("[chris_buys_blocks_blog]")
];

cw_universal_get_header();
?>

<main id="main" class="site-main" role="main">
    <?php
    while (have_posts()) : the_post();
        error_log('single.php - Start rendering post ID: ' . get_the_ID());
        cw_universal_get_template_part_with_fallback('template-parts/content', 'single');
        error_log('single.php - End rendering post ID: ' . get_the_ID());
    endwhile;
    ?>

    <?= implode(' ', $the_content) ?>
</main>

<?php
cw_universal_get_footer();
