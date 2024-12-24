<?php
    $categories = get_categories();
?>
<?php if(!empty($categories)): ?>
    <?php foreach($categories as $category): ?>
        <section class="blog-categories" id="category-<?= esc_html( $category->slug ) ?>">
            <div class="blog-categories__container">
                <div class="blog-section-header">
                    <div class="blog-section-header__title">
                        <h2><?= esc_html( $category->name ) ?></h2>
                    </div>
                    <span class="blog-section-header__line"></span>
                    <a href="<?= get_category_link( $category->term_id ) ?>" class="blog-section-header__link">
                        <span>See all</span>
                    </a>
                </div>
                <div class="blog-categories-content">
                    <?php
                    $args = array(
                        'cat' => $category->term_id,
                        'posts_per_page' => 3
                    );
                    $query = new WP_Query( $args );
                    ?>
                    <?php if ($query->have_posts()): ?>
                        <?php while ($query->have_posts()): $query->the_post(); ?>
                            <article class="blog-categories-element">
                                <a href="<?= get_permalink() ?>" class="blog-categories-element__img">
                                    <?= get_the_post_thumbnail(get_the_ID(), 'medium') ?>
                                </a>
                                <div class="blog-categories-element__content">
                                    <a href="<?= get_permalink() ?>" class="blog-categories-element__title">
                                        <h4><?= get_the_title() ?></h4>
                                    </a>
                                    <div class="blog-categories-element__text">
                                        <p><?= get_the_excerpt() ?></p>
                                    </div>
                                    <div class="blog-user-info">
                                        <div class="blog-user-info__content">
                                            <span><?= get_the_author() ?></span>
                                            <span><?= get_the_date('j M Y') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endforeach; ?>
<?php endif; ?>