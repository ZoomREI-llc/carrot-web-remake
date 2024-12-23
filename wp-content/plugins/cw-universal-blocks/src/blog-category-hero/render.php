<?php
    $categories = get_categories();
    $category = get_queried_object();
    
    if(!$category){
        return 'Page has no queried object.';
    }
    $category_id = $category->term_id;
    $category_title = $category->name;
    $category_slug = $category->slug;
    $is_paged = get_query_var('paged');
?>
<section class="blog-hero <?= $is_paged ? 'blog-hero--small' : ''?>">
    <div class="blog-hero__container">
        <div class="blog-hero-title"><h1><?= $category_title ?></h1></div>
        <?php if(!empty($categories)): ?>
            <div class="blog-hero-caption"><h3>Categories:</h3></div>
            <div class="blog-hero-group mobile-hide">
                <?php foreach($categories as $this_category): ?>
                    <?php if($category_id === $this_category->term_id): ?>
                        <span class="blog-hero-elem is-active"><span><?= esc_html( $this_category->name ) ?></span></span>
                    <?php else: ?>
                        <a href="<?= esc_url( get_category_link($this_category) ) ?>" class="blog-hero-elem"><span><?= esc_html( $this_category->name ) ?></span></a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="blog-hero-dpl mobile-show">
                <span class="output-text"><?= $category_title ?></span>
                <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.837757 1.21358C0.509995 1.55202 0.509936 2.08949 0.837624 2.42801L5.70394 7.45513C6.48786 8.26215 7.75492 8.26215 8.53885 7.45513L13.4121 2.42135C13.7398 2.08286 13.7396 1.54539 13.4118 1.20707C13.0688 0.853126 12.5009 0.853276 12.1581 1.2074L7.32416 6.20085C7.21217 6.31641 7.03089 6.31641 6.91917 6.20085L2.09207 1.21375C1.74908 0.859386 1.18084 0.85931 0.837757 1.21358Z" fill="#2B3849"></path>
                </svg>
                <ul>
                    <?php foreach($categories as $index=>$this_category): ?>
                        <li><a href="<?= esc_url( get_category_link($this_category) ) ?>" <?= $category_id === $this_category->term_id ? 'class="is-selected"' : '' ?>><?= esc_html( $this_category->name ) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <?php if(have_posts() && !$is_paged): the_post();?>
            <?php
            $first_post_id = get_the_ID();
            ?>
            <div class="blog-hero-row">
                <div class="blog-hero-single blog-hero-single--vertical">
                    <a href="<?= get_permalink() ?>" class="blog-hero-single__img">
                        <?= get_the_post_thumbnail(get_the_ID(), 'large') ?>
                    </a>
                    <div class="blog-hero-single__content">
                        <?php
                            $time = ceil(str_word_count(get_the_content()) / 200);
                        ?>
                        <div class="blog-hero-single__time">
                            <span><?= $time < 1 ? '< 1' : $time?> min read</span>
                        </div>
                        <div class="blog-hero-single__container">
                            <div class="blog-hero-single__title"><h3><?= get_the_title() ?></h3></div>
                            <div class="blog-user-info">
                                <div class="blog-user-info__img">
                                    <?= get_avatar(get_the_author_meta('ID'), 64) ?>
                                </div>
                                <div class="blog-user-info__content">
                                    <span><?= get_the_author() ?></span>
                                    <span><?= get_the_date('j M Y') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="blog-hero-single__text">
                            <p><?= get_the_excerpt() ?></p>
                        </div>
                        <a href="<?= get_permalink() ?>" class="blog-hero-single__btn">
                            <span>Read Article</span>
                        </a>
                    </div>
                </div>
                <?php
                $tag_slug = 'featured';
                
                $featured_args = [
                    'cat' => $category_id,
                    'tag' => $tag_slug,
                    'posts_per_page' => 3,
                    'post__not_in' => [$first_post_id]
                ];
                $featured = new WP_Query($featured_args);
                $category_link = get_category_link(get_category_by_slug($category_slug));
                $tag_link = add_query_arg('tag', $tag_slug, $category_link);
                ?>
                <?php if($featured->have_posts()): ?>
                    <div class="blog-hero-col">
                        <div class="blog-hero-col__title">
                            <h3>Featured Articles</h3>
                            <a href="<?= $tag_link ?>">See all</a>
                        </div>
                        <?php while ( $featured->have_posts() ) : $featured->the_post(); ?>
                            <article class="blog-latest-elem blog-latest-elem--small">
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
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>