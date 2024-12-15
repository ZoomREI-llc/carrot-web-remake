<?php
$site_data = cbh_get_site_data();
$market_code = $site_data['market_code'];
$market_city = $site_data['market_city'];

$phone_numbers = [
    'sf'  => '(510) 283-9871',
    'stl' => '(314) 334-1481',
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

    <div class="post-wrapper">
        <main id="main" class="site-main">
            <!-- Blog Post Content -->
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('large');
                    }
                    the_content();
                    ?>
                </div>

                <!-- Social Sharing Buttons -->
                <div class="entry-share">
                    <ul class="entry-share-btns">
                        <li class="entry-share-btn entry-share-btn-facebook">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" title="Share on Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 64 64">
                                    <path d="M42 12c-5.523 0-10 4.477-10 10v6h-8v8h8v28h8V36h9l2-8H40v-6c0-1.105.895-2 2-2h10v-8H42z" fill="#fff"></path>
                                </svg>
                                <b style="font-weight: 400;">Share</b>
                            </a>
                        </li>
                        <li class="entry-share-btn entry-share-btn-twitter">
                            <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" title="Share on Twitter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 64 64">
                                    <path d="M64 12.15c-2.355 1.045-4.885 1.75-7.54 2.068 2.71-1.625 4.792-4.198 5.772-7.264-2.537 1.505-5.347 2.597-8.338 3.186-2.395-2.552-5.808-4.146-9.584-4.146-7.25 0-13.13 5.88-13.13 13.13 0 1.03.116 2.03.34 2.992-10.912-.548-20.588-5.775-27.064-13.72-1.13 1.94-1.778 4.196-1.778 6.602 0 4.556 2.318 8.575 5.84 10.93-2.15-.07-4.176-.66-5.946-1.643v.165c0 6.362 4.525 11.668 10.532 12.875-1.102.3-2.262.46-3.46.46-.845 0-1.668-.082-2.47-.235 1.672 5.216 6.52 9.013 12.267 9.118-4.493 3.522-10.154 5.62-16.306 5.62-1.06 0-2.105-.06-3.132-.183 5.81 3.726 12.713 5.9 20.128 5.9 24.15 0 37.358-20.008 37.358-37.36 0-.568-.013-1.135-.038-1.698 2.566-1.85 4.792-4.164 6.552-6.797z" fill="#fff"></path>
                                </svg>
                                <b style="font-weight: 400;">Tweet</b>
                            </a>
                        </li>
                    </ul>
                </div>
            </article>
        </main>
        <?php carrot_get_template_part('template-parts/sidebar'); ?>
    </div>
</div>

<?php
// Include footer
carrot_get_footer();
?>