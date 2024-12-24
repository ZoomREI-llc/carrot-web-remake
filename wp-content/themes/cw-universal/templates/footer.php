<?php
$site_data = cwu_get_site_data();
?>
<footer id="doctor-homes-footer">
    <div class="grid-container">
        <div class="footer-content">
            <div class="footer-logo">
                <?php
                    $logo_white = get_theme_mod('logo_white');
                    if ($logo_white) {
                        echo '<img src="' . esc_url($logo_white) . '" alt="Logo White">';
                    }
                ?>
            </div>
            <a href="#top" class="back-to-top">
                <div class="back-to-top-icon">
                    <img src="<?php echo get_template_directory_uri() . '/src/assets/menus/polygon-1.svg'; ?>" alt="">
                </div>
                <span>Back to top</span>
            </a>
            <div class="footer-menus">
                <?php
                    $company_menu = wp_nav_menu(array(
                        'theme_location' => 'footer-company-menu',
                        'container' => false,
                        'menu_class' => 'footer-menu-list',
                        'fallback_cb' => '__return_false',
                        'echo' => false
                    ));
                ?>
                <?php if($company_menu): ?>
                    <div class="footer-menu">
                        <span class="footer-title">Company</span>
                        <?= $company_menu ?>
                    </div>
                <?php endif; ?>
    
                <?php
                    $locations_menu = wp_nav_menu(array(
                        'theme_location' => 'footer-locations-menu',
                        'container' => false,
                        'menu_class' => 'footer-menu-list',
                        'fallback_cb' => '__return_false',
                        'echo' => false
                    ));
                ?>
                <?php if($locations_menu): ?>
                    <div class="footer-menu">
                        <span class="footer-title">Locations</span>
                        <?= $locations_menu ?>
                    </div>
                <?php endif; ?>
    
                <?php
                    $resources_menu = wp_nav_menu(array(
                        'theme_location' => 'footer-resources-menu',
                        'container' => false,
                        'menu_class' => 'footer-menu-list',
                        'fallback_cb' => '__return_false',
                        'echo' => false
                    ));
                ?>
                <?php if($resources_menu): ?>
                    <div class="footer-menu">
                        <span class="footer-title">Resources</span>
                        <?= $resources_menu ?>
                    </div>
                <?php endif; ?>
    
                <?php
                    $legal_menu = wp_nav_menu(array(
                        'theme_location' => 'footer-legal-menu',
                        'container' => false,
                        'menu_class' => 'footer-menu-list',
                        'fallback_cb' => '__return_false',
                        'echo' => false
                    ));
                ?>
                <?php if($legal_menu): ?>
                    <div class="footer-menu">
                        <span class="footer-title">Legal</span>
                        <?= $legal_menu ?>
                    </div>
                <?php endif; ?>
                <div class="footer-contact">
                    <span class="footer-title">Contact Us</span>
                    <a class="call-btn" href="tel:<?= get_blog_option(get_current_blog_id(), 'phone', '') ?>">
                        <p class="contact-item"><img src="<?php echo get_template_directory_uri() . '/src/assets/menus/phone-icon-inline.svg'; ?>" alt="Phone Icon" class="contact-icon"><?= get_blog_option(get_current_blog_id(), 'phone', '') ?></p>
                    </a>
                    <a href="mailto:<?= get_blog_option(get_current_blog_id(), 'email', '') ?>">
                        <p class="contact-item"><img src="<?php echo get_template_directory_uri() . '/src/assets/menus/envelope-icon-inline.svg'; ?>" alt="Email Icon" class="contact-icon"><?= get_blog_option(get_current_blog_id(), 'email', '') ?></p>
                    </a>
                    <div class="social-icons">
                        <?php if($site_data['facebook_link']): ?>
                            <a href="<?= $site_data['facebook_link'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-facebook.svg'; ?>" alt="Facebook Icon" class="social-icon"></a>
                        <?php endif; ?>
                        <?php if($site_data['instagram_link']): ?>
                            <a href="<?= $site_data['instagram_link'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-instagram.svg'; ?>" alt="Instagram Icon" class="social-icon"></a>
                        <?php endif; ?>
                        <?php if($site_data['youtube_link']): ?>
                            <a href="<?= $site_data['youtube_link'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-youtube.svg'; ?>" alt="YouTube Icon" class="social-icon"></a>
                        <?php endif; ?>
                        <?php if($site_data['tiktok_link']): ?>
                            <a href="<?= $site_data['tiktok_link'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-tiktok.svg'; ?>" alt="Tiktok Icon" class="social-icon"></a>
                        <?php endif; ?>
                        <?php if($site_data['twitter_link']): ?>
                            <a href="<?= $site_data['twitter_link'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-x.svg'; ?>" alt="X Icon" class="social-icon"></a>
                        <?php endif; ?>
                        <?php if($site_data['linkedin_link']): ?>
                            <a href="<?= $site_data['linkedin_link'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-linkedin.svg'; ?>" alt="LinkedIn Icon" class="social-icon"></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="social-icons">
                    <?php if($site_data['facebook_link']): ?>
                        <a href="<?= $site_data['facebook_link'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-facebook.svg'; ?>" alt="Facebook Icon" class="social-icon"></a>
                    <?php endif; ?>
                    <?php if($site_data['instagram_link']): ?>
                        <a href="<?= $site_data['instagram_link'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-instagram.svg'; ?>" alt="Instagram Icon" class="social-icon"></a>
                    <?php endif; ?>
                    <?php if($site_data['youtube_link']): ?>
                        <a href="<?= $site_data['youtube_link'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-youtube.svg'; ?>" alt="YouTube Icon" class="social-icon"></a>
                    <?php endif; ?>
                    <?php if($site_data['tiktok_link']): ?>
                        <a href="<?= $site_data['tiktok_link'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-tiktok.svg'; ?>" alt="Tiktok Icon" class="social-icon"></a>
                    <?php endif; ?>
                    <?php if($site_data['twitter_link']): ?>
                        <a href="<?= $site_data['twitter_link'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-x.svg'; ?>" alt="X Icon" class="social-icon"></a>
                    <?php endif; ?>
                    <?php if($site_data['linkedin_link']): ?>
                        <a href="<?= $site_data['linkedin_link'] ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/src/assets/social-icons/social-linkedin.svg'; ?>" alt="LinkedIn Icon" class="social-icon"></a>
                    <?php endif; ?>
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