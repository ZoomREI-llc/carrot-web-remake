<footer class="cb-footer">
    <svg viewBox="0 0 100 100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" version="1.1" style="transform: translateY(-6%)" class="cb-footer-triangle">
        <polygon class="cb-footer-triangle-poly-1" fill="#ffffff" points="100,6 100,0 0,0 0,6 0,100"></polygon>
    </svg>
    <div class="cb-footer__conteiner">
        <div class="cb-footer__column-left">
            <div class="cb-footer__projects--row">
                <div class="cb-footer__projects--column">
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
                </div>
                <div class="cb-footer__projects--column">
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
                </div>
            </div>

            <div class="cb-footer__disclaimer">
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
                <li class="cb-footer__social--item">
                    <a class="cb-footer__social--link" href="<?php echo esc_url(get_option('facebook_link')); ?>" rel="noopener" target="_blank">
                        <span class="cb-footer__social--sr-only">Facebook</span>
                        <svg class="" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.8 90.69 226.4 209.3 245V327.7h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.3 482.4 504 379.8 504 256z"></path>
                        </svg>
                    </a>
                </li>
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