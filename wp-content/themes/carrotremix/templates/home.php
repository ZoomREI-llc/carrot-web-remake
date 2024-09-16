<?php
// Include header
carrot_get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <!-- Blog Section -->
        <section class="blog-posts">
            <h1>Blog</h1>

            <!-- Start the loop for displaying posts -->
            <?php if (have_posts()) : ?>
                <div class="post-list">
                    <?php
                    // Set up a custom query to show 15 posts per page
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'posts_per_page' => 15,
                        'paged' => $paged
                    );
                    $custom_query = new WP_Query($args);

                    // Loop through the posts
                    while ($custom_query->have_posts()) : $custom_query->the_post();
                    ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p class="post-date"><?php the_time('F j, Y'); ?></p>
                            <p class="post-excerpt"><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more">Continue Reading &rarr;</a>
                        </article>
                    <?php endwhile; ?>
                </div>

                <!-- Pagination Buttons -->
                <div class="pagination">
                    <div class="older-posts">
                        <?php previous_posts_link('&larr; Newer posts'); ?>
                    </div>
                    <div class="newer-posts">
                        <?php next_posts_link('Older posts &rarr;', $custom_query->max_num_pages); ?>
                    </div>
                </div>

                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php esc_html_e('Sorry, no posts were found.'); ?></p>
            <?php endif; ?>
        </section>

        <!-- Sidebar -->
        <?php get_sidebar(); ?>

    </main>
</div>

<?php
// Include footer
carrot_get_footer();
?>