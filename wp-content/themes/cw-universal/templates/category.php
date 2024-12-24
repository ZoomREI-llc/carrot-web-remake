<?php
    
    $the_content = [
        do_shortcode("[chris_buys_blocks_blog-category-hero]"),
        do_shortcode("[chris_buys_blocks_blog-category]"),
        do_shortcode("[chris_buys_blocks_blog-post-banner]")
    ];
    
    cw_universal_get_header();
?>
<main>
    <?= implode(' ', $the_content) ?>
</main>
<?php cw_universal_get_footer(); ?>
