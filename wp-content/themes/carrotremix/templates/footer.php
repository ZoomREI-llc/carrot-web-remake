<footer class="cb-footer">
    <svg viewBox="0 0 100 100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" version="1.1" style="transform: translateY(-6%)" class="cb-footer-triangle">
        <polygon class="cb-footer-triangle-poly-1" fill="#ffffff" points="100,6 100,0 0,0 0,6 0,100"></polygon>
    </svg>
    <div class="cb-footer__conteiner">
        <div class="cb-footer__column-left">
            <div class="cb-footer__projects--row">
                <div class="cb-footer__projects--column">
                    <?php if (has_nav_menu('local-home-buyers')): ?>
                        <div class="cb-footer__projects-block">
                            <h3 class="cb-footer__projects-block--title">Local Home Buyers In:</h3>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'local-home-buyers',
                                'container' => false,
                                'menu_class' => 'cb-footer__projects-block--list',
                                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                            ));
                            ?>
                        </div>
                    <?php endif; ?>
                    <?php if (has_nav_menu('sell-your-house')): ?>
                        <div class="cb-footer__projects-block">
                            <h3 class="cb-footer__projects-block--title">Sell Your House In:</h3>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'sell-your-house',
                                'container' => false,
                                'menu_class' => 'cb-footer__projects-block--list',
                                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                            ));
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="cb-footer__projects--column">
                    <?php if (has_nav_menu('we-buy-houses')): ?>
                        <div class="cb-footer__projects-block">
                            <h3 class="cb-footer__projects-block--title">We Buy Houses In:</h3>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'we-buy-houses',
                                'container' => false,
                                'menu_class' => 'cb-footer__projects-block--list',
                                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                            ));
                            ?>
                        </div>
                    <?php endif; ?>

                    <?php if (has_nav_menu('Sell Your House in:')): ?>
                        <div class="cb-footer__projects-block">
                            <h3 class="cb-footer__projects-block--title">We Buy Houses In:</h3>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'Sell Your House in:',
                                'container' => false,
                                'menu_class' => 'cb-footer__projects-block--list',
                                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                            ));
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="cb-footer__disclaimer">
                <p>We are a real estate solutions and investment firm that specializes in helping homeowners get rid of burdensome houses fast. We are investors and problem solvers who can buy your house fast with a fair all cash offer.</p>
                <p>The content provided on this website is intended for informational purposes only and does not constitute an offer to buy or a solicitation to sell property. All representations regarding potential transactions are preliminary and subject to change. No content on this site should be interpreted as a binding promise or guarantee of a specific outcome. Each property purchase will be subject to individual negotiation and the execution of a definitive agreement, the terms of which may vary. We make no warranties regarding the accuracy, completeness, legality, or reliability of any information offered on this website. Sellers are advised to conduct their own due diligence and consult with professional advisors prior to entering into any transaction with us.</p>
                <?php
                // Define and apply placeholders dynamically for the contact section
                $footer_contact = '
                    CONTACT:<br>
                    [company]<br>
                    [street_address]<br>
                    [city], [state] [zipcode]<br>
                    <b>[phone]</b><br>
                    <span style="color: #02bdfc"><b><a style="color: #02bdfc" href="mailto:[email]">[email]</a></b></span>
                ';
                echo replace_custom_placeholders_multisite($footer_contact);
                ?>
                <p>&nbsp;</p>
            </div>
            <p class="cb-footer__copy">
                <?php
                // Footer copyright content with dynamic company name
                $footer_copy = '&copy; 2024 [company]';
                echo replace_custom_placeholders_multisite($footer_copy);
                ?>
            </p>
        </div>
        <div class="cb-footer__column-right">
            <ul class="cb-footer__social--list">
                <?php if (get_option('facebook_link')): ?>
                    <li class="cb-footer__social--item">
                        <a class="cb-footer__social--link" href="<?php echo esc_url(get_option('facebook_link')); ?>" rel="noopener" target="_blank">
                            <span class="cb-footer__social--sr-only">Facebook</span>
                            <svg class="svg-inline--fa fa-facebook" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.8 90.69 226.4 209.3 245V327.7h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.3 482.4 504 379.8 504 256z"></path>
                            </svg>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (get_option('twitter_link')): ?>
                    <li class="cb-footer__social--item">
                        <a class="cb-footer__social--link" href="<?php echo esc_url(get_option('twitter_link')); ?>" rel="noopener" target="_blank">
                            <span class="cb-footer__social--sr-only">Twitter</span>
                            <svg class="svg-inline--fa fa-twitter" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M459.4 151.7c.325 4.548 .325 9.097 .325 13.65 0 138.7-105.6 298.6-298.6 298.6-59.45 0-114.7-17.22-161.1-47.11 8.447 .974 16.57 1.299 25.34 1.299 49.06 0 94.21-16.57 130.3-44.83-46.13-.975-84.79-31.19-98.11-72.77 6.498 .974 12.99 1.624 19.82 1.624 9.421 0 18.84-1.3 27.61-3.573-48.08-9.747-84.14-51.98-84.14-102.1v-1.299c13.97 7.797 30.21 12.67 47.43 13.32-28.26-18.84-46.78-51.01-46.78-87.39 0-19.49 5.197-37.36 14.29-52.95 51.65 63.67 129.3 105.3 216.4 109.8-1.624-7.797-2.599-15.92-2.599-24.04 0-57.83 46.78-104.9 104.9-104.9 30.21 0 57.5 12.67 76.67 33.14 23.72-4.548 46.46-13.32 66.6-25.34-7.798 24.37-24.37 44.83-46.13 57.83 21.12-2.273 41.58-8.122 60.43-16.24-14.29 20.79-32.16 39.31-52.63 54.25z"></path>
                            </svg>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (get_option('youtube_link')): ?>
                    <li class="cb-footer__social--item">
                        <a class="cb-footer__social--link" href="<?php echo esc_url(get_option('youtube_link')); ?>" rel="noopener" target="_blank">
                            <span class="cb-footer__social--sr-only">YouTube</span>
                            <svg class="svg-inline--fa fa-youtube" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M549.7 124.1c-6.281-23.65-24.79-42.28-48.28-48.6C458.8 64 288 64 288 64S117.2 64 74.63 75.49c-23.5 6.322-42 24.95-48.28 48.6-11.41 42.87-11.41 132.3-11.41 132.3s0 89.44 11.41 132.3c6.281 23.65 24.79 41.5 48.28 47.82C117.2 448 288 448 288 448s170.8 0 213.4-11.49c23.5-6.321 42-24.17 48.28-47.82 11.41-42.87 11.41-132.3 11.41-132.3s0-89.44-11.41-132.3zm-317.5 213.5V175.2l142.7 81.21-142.7 81.2z"></path>
                            </svg>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (get_option('linkedin_link')): ?>
                    <li class="cb-footer__social--item">
                        <a class="cb-footer__social--link" href="<?php echo esc_url(get_option('linkedin_link')); ?>" rel="noopener" target="_blank">
                            <span class="cb-footer__social--sr-only">Pinterest</span>
                            <svg class="svg-inline--fa fa-linkedin-in" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M100.3 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.6 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.3 61.9 111.3 142.3V448z"></path>
                            </svg>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (get_option('instagram_link')): ?>
                    <li class="cb-footer__social--item">
                        <a class="cb-footer__social--link" href="<?php echo esc_url(get_option('instagram_link')); ?>" rel="noopener" target="_blank">
                            <span class="cb-footer__social--sr-only">Instagram</span>
                            <svg class="svg-inline--fa fa-instagram" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                            </svg>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (get_option('pinterest_link')): ?>
                    <li class="cb-footer__social--item">
                        <a class="cb-footer__social--link" href="<?php echo esc_url(get_option('pinterest_link')); ?>" rel="noopener" target="_blank">
                            <span class="cb-footer__social--sr-only">Pinterest</span>
                            <svg class="svg-inline--fa fa-pinterest" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="pinterest" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3 .8-3.4 5-20.3 6.9-28.1 .6-2.5 .3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"></path>
                            </svg>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (get_option('zillow_link')): ?>
                    <li class="cb-footer__social--item">
                        <a class="cb-footer__social--link" href="<?php echo esc_url(get_option('zillow_link')); ?>" rel="noopener" target="_blank">
                            <svg class="svg-inline--fa fa-zillow" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="zillow" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 24" data-fa-i2svg="">
                                <path fill="currentColor" d="M13.765 6.364C13.868 6.337 13.915 6.376 13.976 6.448C14.326 6.864 15.454 8.314 15.761 8.711C15.7722 8.72505 15.7804 8.74124 15.7851 8.75858C15.7898 8.77591 15.791 8.79403 15.7884 8.81182C15.7859 8.82961 15.7798 8.84669 15.7704 8.86203C15.7611 8.87736 15.7487 8.89062 15.734 8.901C13.46 10.774 10.93 13.423 9.52 15.321C9.49 15.361 9.515 15.364 9.535 15.355C11.991 14.239 17.759 12.458 20.361 11.959V8.485L10.191 0L0 8.485V12.282C3.159 10.301 10.458 7.234 13.765 6.364ZM5.271 20.922C5.326 20.99 5.421 21.004 5.491 20.956C9.269 18.902 17.58 16.295 20.361 15.796V23.602H0.000999987V15.492C2.094 14.242 7.748 11.678 9.738 10.992C9.778 10.978 9.787 11.002 9.753 11.029C7.843 12.526 4.849 16.059 3.382 18.33C3.315 18.436 3.319 18.47 3.372 18.535L5.271 20.922Z"></path>
                            </svg>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
            <nav class="cb-footer__nav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-navigation',
                    'container' => false,
                    'menu_class' => 'cb-footer__nav--list',
                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                ));
                ?>
            </nav>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>