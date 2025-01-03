<?php
// Include the header
ob_start();
while (have_posts()) : the_post();
    the_content();
endwhile;
$the_content = ob_get_clean();
cw_universal_get_header(); ?>

<main id="site-content" role="main">
    <div class="legal-content">
        <h1 class="legal-title"><?php the_title(); ?></h1>
        <?= $the_content ?>
    </div>
</main>

<?php
// Include the footer
cw_universal_get_footer();
