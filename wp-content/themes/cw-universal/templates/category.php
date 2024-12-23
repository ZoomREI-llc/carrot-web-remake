<?php
    
    $the_content = [
        do_shortcode("[cw_universal_blog-category-hero]"),
        do_shortcode("[cw_universal_blog-category]"),
        do_shortcode("[cw_universal_blog-post-banner]")
    ];
    
    cw_universal_get_header();
?>
<main>
    <?= implode(' ', $the_content) ?>
</main>
<?php cw_universal_get_footer(); ?>
