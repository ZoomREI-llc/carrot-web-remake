<?php
// Include header
carrot_get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <!-- Blog Post Content -->
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <p class="post-meta">
                    <?php echo get_the_date(); ?> | By <?php the_author(); ?>
                </p>
            </header>

            <div class="entry-content">
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('large');
                }
                the_content();
                ?>
            </div>

            <!-- Social Sharing Buttons -->
            <div class="social-share">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="share-button facebook-share">Share on Facebook</a>
                <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" class="share-button twitter-share">Tweet</a>
            </div>

            <!-- Sidebar -->
            <?php get_sidebar(); ?>
        </article>

        <!-- Bottom Form Section (Gravity Forms Shortcode) -->
        <div class="post-bottom-form">
            <h2>Get More Info On Options To Sell Your Home...</h2>
            <p>Selling a property in today's market can be confusing. Connect with us or submit your info below and we’ll help guide you through your options.</p>
            <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
        </div>
    </main>
</div>

<?php
// Include footer
carrot_get_footer();
?>