<?php

/**
 * content-single.php
 * Template part for displaying single post content with separate intro logic.
 */

// 1) Get raw (unfiltered) post content
$raw_content = get_post_field('post_content', get_the_ID());

// 2) Parse blocks
$blocks = parse_blocks($raw_content);

/**
 * 3) Identify which block (if any) is .is-intro, or fallback to first paragraph.
 */
$is_intro_key = null;

// First pass: look for .is-intro anywhere
foreach ($blocks as $i => $block) {
    if (
        $block['blockName'] === 'core/paragraph'
        && !empty($block['attrs']['className'])
        && strpos($block['attrs']['className'], 'is-intro') !== false
    ) {
        $is_intro_key = $i;
        break;
    }
}

// If none found, fallback to the first paragraph
if (is_null($is_intro_key)) {
    foreach ($blocks as $i => $block) {
        if ($block['blockName'] === 'core/paragraph') {
            $is_intro_key = $i;
            break;
        }
    }
}

/**
 * 4) Also look for a Rank Math TOC block (rank-math/toc-block).
 */
$rank_math_toc_key = null;

foreach ($blocks as $i => $block) {
    if ($block['blockName'] === 'rank-math/toc-block') {
        $rank_math_toc_key = $i;
        break;
    }
}

/**
 * 5) Separate into intro_blocks vs. main_blocks.
 */
$intro_blocks = [];
$main_blocks  = [];

// If we found an intro block
if (!is_null($is_intro_key)) {
    $intro_blocks[] = $blocks[$is_intro_key];
}

// If we found a TOC block
$rank_math_toc_block = null;
if (!is_null($rank_math_toc_key)) {
    $rank_math_toc_block = $blocks[$rank_math_toc_key];
}

// Everything else is main
foreach ($blocks as $i => $block) {
    // Skip the intro block
    if ($i === $is_intro_key) {
        continue;
    }
    // Skip the TOC block
    if ($i === $rank_math_toc_key) {
        continue;
    }
    // This block is normal content
    $main_blocks[] = $block;
}

/**
 * 6) Render blocks as HTML strings.
 */
$intro_html = '';
foreach ($intro_blocks as $block) {
    $intro_html .= render_block($block);
}
$main_html = '';
foreach ($main_blocks as $block) {
    $main_html .= render_block($block);
}

// Render the TOC block separately
$toc_html = '';
if (!empty($rank_math_toc_block)) {
    $toc_html .= render_block($rank_math_toc_block);
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="grid-container">
        <header class="entry-header">
            <?php echo get_breadcrumb(); ?>
            <div class="entry-dets">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                <div class="entry-meta">
                    <div class="entry-meta__avatar">
                        <?php echo get_avatar( get_the_author_meta( 'ID' )); ?>
                    </div>
                    <span class="author"><?php the_author(); ?></span>&nbsp;|&nbsp;<span class="date"><?php the_date(); ?></span>
                </div>
            </div>
            <?php get_template_part('template-parts/share-bar'); ?>
        </header>
    
        <div class="post-intro">
            <!-- FIRST PARAGRAPH OR class="is-intro" -->
            <div class="intro-text">
                <?php echo $intro_html; // The paragraph chosen as intro
                ?>
            </div>
    
            <!-- FEATURED IMAGE (IF PRESENT) -->
            <div class="featured-image">
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('large');
                } ?>
            </div>
    
            <!-- RANK MATH TOC BLOCK (IF PRESENT) -->
            <?php
            echo $toc_html;
            ?>
        </div>
    
        <div class="entry-content__wrapper">
            <div class="entry-content">
                <?php echo $main_html; ?>
            </div>
    
            <aside class="entry-content__aside">
                <div class="entry-banner">
                    <div class="entry-banner__content">
                        <div class="entry-banner__title">
                            <h2><strong>Fresh Start,</strong><br> Zero Hassle.</h2>
                        </div>
                        <div class="entry-banner__subtitle">
                            <h3>Sell your home Fast As-Is</h3>
                        </div>
                        <div class="entry-banner__btn">
                            <a href="<?= get_offer_button_link() ?>" class="btn cta-btn">
                                Get My Offer
                            </a>
                        </div>
                    </div>
                    <div class="entry-banner__img">
                        <img
                            src="<?php echo get_template_directory_uri() . '/src/assets/share/bg.jpg'; ?>"
                            alt=""
                            width="304"
                            height="188">
                    </div>
                </div>
            </aside>
        </div>
    
        <footer class="entry-footer">
            <?php get_template_part('template-parts/share-bar'); ?>
    
            <div class="author-bio">
                <div class="author-avatar">
                    <?php
                    $profile_picture = get_the_author_meta('profile_picture');
                    if ($profile_picture) {
                        echo '<img src="' . esc_url($profile_picture) . '" alt="' . esc_attr(get_the_author()) . '" />';
                    } else {
                        echo get_avatar(get_the_author_meta('ID'), 96);
                    }
                    ?>
                </div>
                <div class="author-description">
                    <div class="author-info">
                        <h3><?php the_author(); ?></h3>
                        <p class="author-title"><?php echo esc_html(get_the_author_meta('author_title')); ?></p>
                    </div>
                    <p><?php the_author_meta('description'); ?></p>
                    <a
                        href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"
                        class="author-link">
                        Read full author bio
                    </a>
                </div>
            </div>
    
            <div class="entry-banner">
                <div class="entry-banner__content">
                    <div class="entry-banner__title">
                        <h2><strong>Fresh Start,</strong><br> Zero Hassle.</h2>
                    </div>
                    <div class="entry-banner__subtitle">
                        <h3>Sell your home Fast As-Is</h3>
                    </div>
                    <div class="entry-banner__btn">
                        <a href="<?= get_offer_button_link() ?>" class="btn cta-btn">
                            Get My Offer
                        </a>
                    </div>
                </div>
                <div class="entry-banner__img">
                    <img
                        src="<?php echo get_template_directory_uri() . '/src/assets/share/bg.jpg'; ?>"
                        alt=""
                        width="304"
                        height="188">
                </div>
            </div>
        </footer>
    </div>
</article>