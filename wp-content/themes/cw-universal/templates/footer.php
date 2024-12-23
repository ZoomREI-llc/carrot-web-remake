<footer id="doctor-homes-footer">
    <div class="grid-container">
        <div class="footer-content">
            <div class="footer-logo">
                <?= get_custom_logo(); ?>
            </div>
            <a href="#top" class="back-to-top">
                <div class="back-to-top-icon">
                    <img src="<?php echo get_template_directory_uri() . '/src/assets/menus/polygon-1.svg'; ?>" alt="">
                </div>
                <span>Back to top</span>
            </a>
            <div class="footer-menus">
                <div class="footer-menu">
                    <span class="footer-title">Company</span>
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-company-menu',
                            'container' => false,
                            'menu_class' => 'footer-menu-list',
                        ));
                    ?>
                </div>
                <div class="footer-menu">
                    <span class="footer-title">Locations</span>
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-locations-menu',
                            'container' => false,
                            'menu_class' => 'footer-menu-list',
                        ));
                    ?>
                </div>
                <div class="footer-menu">
                    <span class="footer-title">Resources</span>
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-resources-menu',
                            'container' => false,
                            'menu_class' => 'footer-menu-list',
                        ));
                    ?>
                </div>
                <div class="footer-menu">
                    <span class="footer-title">Legal</span>
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-legal-menu',
                            'container' => false,
                            'menu_class' => 'footer-menu-list',
                        ));
                    ?>
                </div>
                <div class="footer-contact">
                    <span class="footer-title">Contact Us</span>
                    <a class="call-btn" href="tel:(234) DR HOMES">
                        <p class="contact-item"><img src="<?php echo get_template_directory_uri() . '/src/assets/menus/phone-icon-inline.svg'; ?>" alt="Phone Icon" class="contact-icon">(234) DR-HOMES</p>
                    </a>
                    <a href="mailto:contact@doctorhomes.com">
                        <p class="contact-item"><img src="<?php echo get_template_directory_uri() . '/src/assets/menus/envelope-icon-inline.svg'; ?>" alt="Email Icon" class="contact-icon">contact@doctorhomes.com</p>
                    </a>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/thedoctorhomes/" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-facebook.svg'; ?>" alt="Facebook Icon" class="social-icon"></a>
                        <a href="https://www.instagram.com/doctorhomes_/" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-instagram.svg'; ?>" alt="Instagram Icon" class="social-icon"></a>
                        <a href="https://www.youtube.com/@TheDoctorHomes/" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-youtube.svg'; ?>" alt="YouTube Icon" class="social-icon"></a>
                        <a href="https://www.tiktok.com/@thedoctorhomes/" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-tiktok.svg'; ?>" alt="Tiktok Icon" class="social-icon"></a>
                        <a href="https://x.com/thedoctorhomes/" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-x.svg'; ?>" alt="X Icon" class="social-icon"></a>
                        <a href="https://www.linkedin.com/company/doctorhomes/" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-linkedin.svg'; ?>" alt="LinkedIn Icon" class="social-icon"></a>
                    </div>
                </div>
                <div class="social-icons">
                    <a href="https://www.facebook.com/thedoctorhomes/" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-facebook.svg'; ?>" alt="Facebook Icon" class="social-icon"></a>
                    <a href="https://www.instagram.com/doctorhomes_/" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-instagram.svg'; ?>" alt="Instagram Icon" class="social-icon"></a>
                    <a href="https://www.youtube.com/@TheDoctorHomes/" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-youtube.svg'; ?>" alt="YouTube Icon" class="social-icon"></a>
                    <a href="https://www.tiktok.com/@thedoctorhomes/" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-tiktok.svg'; ?>" alt="Tiktok Icon" class="social-icon"></a>
                    <a href="https://x.com/thedoctorhomes/" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-x.svg'; ?>" alt="X Icon" class="social-icon"></a>
                    <a href="https://www.linkedin.com/company/doctorhomes/" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-linkedin.svg'; ?>" alt="LinkedIn Icon" class="social-icon"></a>
                </div>

            </div>
        </div>
        <div class="footer-disclaimer">
            <p>The content provided on this website is intended for informational purposes only and does not constitute an offer to buy or a solicitation to sell property. All representations regarding potential transactions are preliminary and subject to change. No content on this site should be interpreted as a binding promise or guarantee of a specific outcome. Each property purchase will be subject to individual negotiation and the execution of a definitive agreement, the terms of which may vary. We make no warranties regarding the accuracy, completeness, legality, or reliability of any information offered on this website. Sellers are advised to conduct their own due diligence and consult with professional advisors prior to entering into any transaction with us.</p>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>
</body>

</html>