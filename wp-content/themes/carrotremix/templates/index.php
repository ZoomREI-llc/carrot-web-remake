<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php carrot_get_header(); ?>
    <main>
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                carrot_get_template_part_with_fallback('template-parts/content', get_post_format());
            endwhile;
        else :
            carrot_get_template_part_with_fallback('template-parts/content', 'none');
        endif;
        ?>
    </main>
    <?php carrot_get_footer(); ?>
    <?php wp_footer(); ?>
</body>

</html>
