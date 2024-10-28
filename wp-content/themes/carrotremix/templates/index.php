<?php
$site_id = get_current_blog_id();
$market_city = get_blog_option($site_id, 'market_city', '');
$market_code = get_blog_option($site_id, 'market_code', '');

$phone_numbers = [
    'sf'  => '(510) 283-9871',
    'stl' => '(314) 887-8043',
    'kc'  => '(816) 720-7760',
    'det' => '(313) 217-9851',
    'cle' => '(216) 677-2169',
    'ind' => '(317) 526-4712',
];

$phoneNumber = isset($phone_numbers[$market_code]) ? $phone_numbers[$market_code] : '';

carrot_get_header();
?>

<div id="primary" class="content-area">
    <?php carrot_get_template_part('template-parts/hero'); ?>

    <div class="blog-wrapper">
        <main id="main" class="site-main">
            <h1>Blog</h1>
            <div class="blog-content">
                <?php
                // Set up pagination variables
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                // Query for the latest 15 posts with pagination
                $args = array(
                    'posts_per_page' => 15,
                    'post_status'    => 'publish',
                    'paged'          => $paged,
                );
                $latest_posts = new WP_Query($args);

                if ($latest_posts->have_posts()) :
                    while ($latest_posts->have_posts()) : $latest_posts->the_post();
                ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="entry-meta">
                                    <time class="date"><?php the_time('F j, Y'); ?></time>
                                    <p class="author">By <?php the_author(); ?></p>
                                </div>
                            </header>

                            <div class="entry-content">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php endif; ?>
                                <p><?php echo get_the_excerpt(); ?> <a href="<?php the_permalink(); ?>" class="read-more">Continue Reading</a></p>
                            </div>
                        </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No posts found.</p>';
                endif;
                ?>

                <!-- Pagination Section -->
                <div class="pagination">
                    <?php
                    echo paginate_links(array(
                        'total'        => $latest_posts->max_num_pages,
                        'current'      => max(1, get_query_var('paged')),
                        'prev_text'    => '← Newer Posts',
                        'next_text'    => 'Older Posts →',
                    ));
                    ?>
                </div>
            </div>
        </main>

        <!-- Sidebar -->
        <?php carrot_get_template_part('template-parts/sidebar'); ?>
    </div>
</div>

<?php carrot_get_footer(); ?>