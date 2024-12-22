<?php

$the_content = [
    do_shortcode("[cw_universal_blog-hero]"),
    do_shortcode("[cw_universal_blog-latest]"),
    do_shortcode("[cw_universal_blog-post-banner]"),
    do_shortcode("[cw_universal_blog-categories]"),
    do_shortcode("[cw_universal_blog-post-banner]")
];

cw_universal_get_header();
?>
<main>
    <?= implode(' ', $the_content) ?>
</main>
<?php cw_universal_get_footer(); ?>