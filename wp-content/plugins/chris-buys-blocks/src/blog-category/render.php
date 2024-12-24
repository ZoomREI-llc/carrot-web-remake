
<?php if(have_posts()): ?>
<section class="blog-category">
    <div class="blog-category__container">
        <div class="blog-hero-col__title">
            <h3><?php single_cat_title() ?> Articles</h3>
        </div>
        <div class="blog-category__cards">
            <?php while ( have_posts() ) : the_post(); ?>
                <article class="blog-latest-elem">
                    <a href="<?= get_permalink() ?>" class="blog-latest-elem__img">
                        <?= get_the_post_thumbnail(get_the_ID(), 'medium') ?>
                    </a>
                    <div class="blog-latest-elem__content">
                        <a href="<?= get_permalink() ?>" class="blog-latest-elem__title">
                            <h4><?= get_the_title() ?></h4>
                        </a>
                        <div class="blog-user-info">
                            <div class="blog-user-info__content">
                                <span><?= get_the_author() ?></span>
                                <span><?= get_the_date('j M Y') ?></span>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <?php
        $pagination_links = get_the_posts_pagination([
            'mid_size' => 2,
            'screen_reader_text' => 'More content',
            'prev_next' => false
        ]);
        ?>
        <?php if(trim($pagination_links)) { ?>
            <div class="blog-category__pagination">
                <div class="blog-category__pagination-title">
                    <span>More content</span>
                </div>
                <div class="blog-category__pagination-row">
                    <?php
                    add_filter('previous_posts_link_attributes', function ( $attr ) {
                        return $attr . ' class="prev page-numbers"';
                    });
                    add_filter('next_posts_link_attributes', function ( $attr ) {
                        return $attr . ' class="next page-numbers"';
                    });
                    
                    $prev_link = get_previous_posts_link('Prev');
                    $next_link = get_next_posts_link('Next');
        
                    if (!$prev_link) {
                        $prev_link = '<span class="prev page-numbers">Prev</span>';
                    }
        
                    if (!$next_link) {
                        $next_link = '<span class="next page-numbers">Next</span>';
                    }
                    
                    echo $prev_link;
                    echo $pagination_links;
                    echo $next_link;
                    ?>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<?php endif; ?>