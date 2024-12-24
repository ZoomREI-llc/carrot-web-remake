<?php
    $categories = get_categories();
?>
<section class="blog-hero">
    <div class="blog-hero__container">
        <div class="blog-hero-title"><h1>[company] Blog</h1></div>
        <?php if(!empty($categories)): ?>
            <div class="blog-hero-caption"><h3>Categories:</h3></div>
            <div class="blog-hero-group mobile-hide">
                <?php foreach($categories as $category): ?>
                    <a href="#category-<?= esc_html( $category->slug ) ?>" class="blog-hero-elem"><span><?= esc_html( $category->name ) ?></span></a>
                <?php endforeach; ?>
            </div>
            <div class="blog-hero-dpl mobile-show">
                <span class="output-text"><?= esc_html( $categories[0]->name ) ?></span>
                <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.837757 1.21358C0.509995 1.55202 0.509936 2.08949 0.837624 2.42801L5.70394 7.45513C6.48786 8.26215 7.75492 8.26215 8.53885 7.45513L13.4121 2.42135C13.7398 2.08286 13.7396 1.54539 13.4118 1.20707C13.0688 0.853126 12.5009 0.853276 12.1581 1.2074L7.32416 6.20085C7.21217 6.31641 7.03089 6.31641 6.91917 6.20085L2.09207 1.21375C1.74908 0.859386 1.18084 0.85931 0.837757 1.21358Z" fill="#2B3849"></path>
                </svg>
                <ul>
                    <?php foreach($categories as $index=>$category): ?>
                        <li><a href="#category-<?= esc_html( $category->slug ) ?>" <?= $index === 0 ? 'class="is-selected"' : '' ?>><?= esc_html( $category->name ) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        
        <?php
        $query = new WP_Query(array(
            'posts_per_page' => 10,
            'post_status' => 'publish',
        ));
        ?>
        <?php if ($query->have_posts()): ?>
            <div class='_carousel-wrapper blog-hero__slider'>
                <div class="_carousel-container">
                    <div class="_carousel-inner">
                        <?php while ($query->have_posts()): $query->the_post(); ?>
                            <div class="_carousel-slide ">
                                <div class="blog-hero-single">
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
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
                
                <div class="blog-hero-single__controls _carousel-controls">
                    <button type="button" class="prevButton"><svg width="26" height="20" viewBox="0 0 26 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23.6196 9.86719L2.51867 9.86719" stroke="#2B3849" stroke-width="3" stroke-linecap="round"></path>
                            <path d="M10.3643 1.86133C10.3643 1.86133 2.37744 9.63904 2.37744 10.0005C2.37744 10.362 10.3643 18.1396 10.3643 18.1396" stroke="#2B3849" stroke-width="3" stroke-linecap="round"></path>
                        </svg>
                    </button>
                    <button type="button" class="nextButton"><svg width="26" height="20" viewBox="0 0 26 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.37744 10.1328L23.4784 10.1328" stroke="#2B3849" stroke-width="3" stroke-linecap="round"></path>
                            <path d="M15.6327 18.1387C15.6327 18.1387 23.6196 10.361 23.6196 9.99949C23.6196 9.63802 15.6327 1.86035 15.6327 1.86035" stroke="#2B3849" stroke-width="3" stroke-linecap="round"></path>
                        </svg>
                    </button>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>