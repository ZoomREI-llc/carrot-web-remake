<section class="latest-blog-posts">
    <div class="grid-container">
        <h2 class="title-2">Check Out the Latest From Our Blog</h2>
        <?php
        $latest_posts = new WP_Query(array(
            'posts_per_page' => 3,
            'post_status' => 'publish'
        ));
        if ($latest_posts->have_posts()) :
            while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
                <div class="latest-post">
                    <div class="post-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) {
                                the_post_thumbnail('large');
                            } else { ?>
                                <img src="path/to/default-image.jpg" alt="<?php the_title(); ?>">
                            <?php } ?>
                        </a>
                        <span class="category-name title-1"><?php the_category(', '); ?></span>
                    </div>
                    <div class="post-content">
                        <div class="post-content__text">
                            <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="post-meta">By <?php the_author(); ?> on <?php echo get_the_date(); ?></p>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="btn btn--smallest btn--transparent">Read More</a>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        else : ?>
            <p><?php esc_html_e('No recent posts available.', 'text-domain'); ?></p>
        <?php endif; ?>
    </div>
</section>