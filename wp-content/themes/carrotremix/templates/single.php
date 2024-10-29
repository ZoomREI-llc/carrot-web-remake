<?php
$site_id = get_current_blog_id();
$market_city = get_blog_option($site_id, 'market_city', '');
$market_code = get_blog_option($site_id, 'market_code', '');

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
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="entry-meta">
                        <time class="date"><?php the_date(); ?></time>
                        <p class="author">By <?php the_author(); ?></p>
                    </div>
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

                <div class="post-bottom-form">
                    <h5>Get More Info On Options To Sell Your Home...</h5>
                    <p>Selling a property in today's market can be confusing. Connect with us or submit your info below and we’ll help guide you through your options.</p>
                    <p>We buy houses in ANY CONDITION in <?php echo $market_city; ?>. There are no commissions or fees and no obligation whatsoever. For the fastest service, call us now <a href="tel:<?php echo $phoneNumber; ?>"><?php echo $phoneNumber; ?></a></p>
                    <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>

                    <ul class="social-list">
                        <?php if (get_option('facebook_link')): ?>
                            <li class="social-item">
                                <a class="social-link" href="<?php echo esc_url(get_option('facebook_link')); ?>" rel="noopener" target="_blank">
                                    <span class="social--sr-only">Facebook</span>
                                    <svg class="svg-inline--fa fa-facebook" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.8 90.69 226.4 209.3 245V327.7h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.3 482.4 504 379.8 504 256z"></path>
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (get_option('twitter_link')): ?>
                            <li class="social-item">
                                <a class="social-link" href="<?php echo esc_url(get_option('twitter_link')); ?>" rel="noopener" target="_blank">
                                    <span class="social--sr-only">Twitter</span>
                                    <svg class="svg-inline--fa fa-twitter" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M459.4 151.7c.325 4.548 .325 9.097 .325 13.65 0 138.7-105.6 298.6-298.6 298.6-59.45 0-114.7-17.22-161.1-47.11 8.447 .974 16.57 1.299 25.34 1.299 49.06 0 94.21-16.57 130.3-44.83-46.13-.975-84.79-31.19-98.11-72.77 6.498 .974 12.99 1.624 19.82 1.624 9.421 0 18.84-1.3 27.61-3.573-48.08-9.747-84.14-51.98-84.14-102.1v-1.299c13.97 7.797 30.21 12.67 47.43 13.32-28.26-18.84-46.78-51.01-46.78-87.39 0-19.49 5.197-37.36 14.29-52.95 51.65 63.67 129.3 105.3 216.4 109.8-1.624-7.797-2.599-15.92-2.599-24.04 0-57.83 46.78-104.9 104.9-104.9 30.21 0 57.5 12.67 76.67 33.14 23.72-4.548 46.46-13.32 66.6-25.34-7.798 24.37-24.37 44.83-46.13 57.83 21.12-2.273 41.58-8.122 60.43-16.24-14.29 20.79-32.16 39.31-52.63 54.25z"></path>
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (get_option('youtube_link')): ?>
                            <li class="social-item">
                                <a class="social-link" href="<?php echo esc_url(get_option('youtube_link')); ?>" rel="noopener" target="_blank">
                                    <span class="social--sr-only">YouTube</span>
                                    <svg class="svg-inline--fa fa-youtube" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M549.7 124.1c-6.281-23.65-24.79-42.28-48.28-48.6C458.8 64 288 64 288 64S117.2 64 74.63 75.49c-23.5 6.322-42 24.95-48.28 48.6-11.41 42.87-11.41 132.3-11.41 132.3s0 89.44 11.41 132.3c6.281 23.65 24.79 41.5 48.28 47.82C117.2 448 288 448 288 448s170.8 0 213.4-11.49c23.5-6.321 42-24.17 48.28-47.82 11.41-42.87 11.41-132.3 11.41-132.3s0-89.44-11.41-132.3zm-317.5 213.5V175.2l142.7 81.21-142.7 81.2z"></path>
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (get_option('linkedin_link')): ?>
                            <li class="social-item">
                                <a class="social-link" href="<?php echo esc_url(get_option('linkedin_link')); ?>" rel="noopener" target="_blank">
                                    <span class="social--sr-only">Pinterest</span>
                                    <svg class="svg-inline--fa fa-linkedin-in" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M100.3 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.6 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.3 61.9 111.3 142.3V448z"></path>
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (get_option('instagram_link')): ?>
                            <li class="social-item">
                                <a class="social-link" href="<?php echo esc_url(get_option('instagram_link')); ?>" rel="noopener" target="_blank">
                                    <span class="social--sr-only">Instagram</span>
                                    <svg class="svg-inline--fa fa-instagram" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (get_option('pinterest_link')): ?>
                            <li class="social-item">
                                <a class="social-link" href="<?php echo esc_url(get_option('pinterest_link')); ?>" rel="noopener" target="_blank">
                                    <span class="social--sr-only">Pinterest</span>
                                    <svg class="svg-inline--fa fa-pinterest" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="pinterest" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3 .8-3.4 5-20.3 6.9-28.1 .6-2.5 .3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"></path>
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (get_option('zillow_link')): ?>
                            <li class="social-item">
                                <a class="social-link" href="<?php echo esc_url(get_option('zillow_link')); ?>" rel="noopener" target="_blank">
                                    <svg class="svg-inline--fa fa-zillow" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="zillow" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 24" data-fa-i2svg="">
                                        <path fill="currentColor" d="M13.765 6.364C13.868 6.337 13.915 6.376 13.976 6.448C14.326 6.864 15.454 8.314 15.761 8.711C15.7722 8.72505 15.7804 8.74124 15.7851 8.75858C15.7898 8.77591 15.791 8.79403 15.7884 8.81182C15.7859 8.82961 15.7798 8.84669 15.7704 8.86203C15.7611 8.87736 15.7487 8.89062 15.734 8.901C13.46 10.774 10.93 13.423 9.52 15.321C9.49 15.361 9.515 15.364 9.535 15.355C11.991 14.239 17.759 12.458 20.361 11.959V8.485L10.191 0L0 8.485V12.282C3.159 10.301 10.458 7.234 13.765 6.364ZM5.271 20.922C5.326 20.99 5.421 21.004 5.491 20.956C9.269 18.902 17.58 16.295 20.361 15.796V23.602H0.000999987V15.492C2.094 14.242 7.748 11.678 9.738 10.992C9.778 10.978 9.787 11.002 9.753 11.029C7.843 12.526 4.849 16.059 3.382 18.33C3.315 18.436 3.319 18.47 3.372 18.535L5.271 20.922Z"></path>
                                    </svg>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </article>


        </main>
        <!-- Sidebar -->
        <?php carrot_get_template_part('template-parts/sidebar'); ?>
    </div>
</div>

<?php
// Include footer
carrot_get_footer();
?>