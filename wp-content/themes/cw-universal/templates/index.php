<?php

$the_content = [
    do_shortcode("[chris_buys_blocks_blog-hero]"),
    do_shortcode("[chris_buys_blocks_blog-latest]"),
    do_shortcode("[chris_buys_blocks_blog-post-banner]"),
    do_shortcode("[chris_buys_blocks_blog-categories]"),
    do_shortcode("[chris_buys_blocks_blog-post-banner]")
];

cw_universal_get_header();
?>
<main>
    <?= implode(' ', $the_content) ?>
</main>
<?php cw_universal_get_footer(); ?>