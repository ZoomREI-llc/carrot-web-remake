<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="cb-header">
        <div class="cb-header__inner">
            <div class="cb-header__logo">
                <?php if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                } ?>
            </div>
            <nav class="cb-header__mobile-nav">
                <div class="cb-telephone-container">
                    <svg viewBox="0 0 100 100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" version="1.1" style="transform: translateY(6%)" class="cb-triangle cb-triangle-top">
                        <polygon class="hl-triangle-poly-1" fill="#ff651e" points="0,94 0,100 100,100 100,94 100,0"></polygon>
                    </svg>
                    <div class="cb-telephone-text">
                        <span class="cb-contact-phone-text">Call Us!</span>
                        <span itemprop="telephone">
                            <b><a href="tel:816-227-6952" style="color: #02bdfc">(816) 227-6952</a></b>
                        </span>
                    </div>
                </div>
                <a href="#" class='cb-header__mobile-nav-link'>Get A Cash Offer Today</a>
                <button type="button" class="cb-header__mobile-toggler">
                    Menu&nbsp;▾
                </button>
            </nav>
            <nav class="cb-header__menu-block">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'cb-header__menu',
                    'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                ));
                ?>
            </nav>
        </div>
    </header>