<?php
    $query = new WP_Query(array(
        'posts_per_page' => 6,
        'post_status' => 'publish',
    ));
?>

<section class="blog-latest">
    <div class="blog-latest__container">
        <div class="blog-section-header">
            <div class="blog-section-header__title">
                <h2>Latest Articles</h2>
            </div>
            <a href="<?= get_permalink(get_option('page_for_posts')); ?>" class="blog-section-header__link">
                <span>See all</span>
            </a>
        </div>
        <div class="blog-latest-content">
            <?php if ($query->have_posts()): ?>
                <?php while ($query->have_posts()): $query->the_post(); ?>
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
            <?php endif; ?>
        </div>
    </div>
</section>

