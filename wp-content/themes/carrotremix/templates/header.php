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
                <a href="<?php echo site_url() ?>/" class="cb-header__logo--link">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/header-logo.webp" alt="" class="cb-header__logo--img">
                </a>
            </div>
            <nav class="cb-header__mobile-nav">
                <div class="cb-telephone-container">
                   <svg viewBox="0 0 100 100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" version="1.1" style="transform: translateY(6%)" class="cb-triangle cb-triangle-top"> <polygon class="hl-triangle-poly-1" fill="#ff651e" points="0,94 0,100 100,100 100,94 100,0"></polygon> </svg>        
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
                <ul class="cb-header__menu">
                    <li class="cb-header__menu--item">
                        <a href="<?php echo site_url() ?>/how-it-works/" class="cb-header__menu--link">How It Works</a>
                    </li>
                    <li class="cb-header__menu--item">
                        <a href="<?php echo site_url() ?>/faq/" class="cb-header__menu--link">FAQ</a>
                    </li>
                    <li class="cb-header__menu--item">
                        <a href="<?php echo site_url() ?>/our-company/" class="cb-header__menu--link">Our Company</a>
                    </li>
                    <li class="cb-header__menu--item">
                        <a href="<?php echo site_url() ?>/contact-us/" class="cb-header__menu--link">Contact Us</a>
                    </li>
                    <li class="cb-header__menu--item">
                       <a href='<?php echo site_url() ?>/sell-your-house/' class="cb-header__sell-yuor-house"><strong>Sell Your House</strong></a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>



    <style>

/* -----------fonts------------------ */
html {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
*,
*::before,
*::after {
  -webkit-box-sizing: inherit;
  box-sizing: inherit;
}
@font-face {
	font-family: "Poppins";
	src: url("<?php echo get_stylesheet_directory_uri() ?>/src/fonts/poppins/Poppins-Regular.woff2") format("woff2"),
	  url("<?php echo get_stylesheet_directory_uri() ?>/src/fonts/poppins/Poppins-Regular.woff") format("woff");
	font-weight: normal;
	font-style: normal;
 }
 
 @font-face {
	font-family: "Poppins";
	src: url("<?php echo get_stylesheet_directory_uri() ?>/src/fonts/poppins/Poppins-Italic.woff2") format("woff2"),
	  url("<?php echo get_stylesheet_directory_uri() ?>/src/fonts/poppins/Poppins-Italic.woff") format("woff");
	font-weight: normal;
	font-style: italic;
 }
 
 @font-face {
	font-family: "Poppins";
	src: url("<?php echo get_stylesheet_directory_uri() ?>/src/fonts/poppins/Poppins-Bold.woff2") format("woff2"),
	  url("<?php echo get_stylesheet_directory_uri() ?>/src/fonts/poppins/Poppins-Bold.woff") format("woff");
	font-weight: bold;
	font-style: normal;
 }
 
 @font-face {
	font-family: "Poppins";
	src: url("<?php echo get_stylesheet_directory_uri() ?>/src/fonts/poppins/Poppins-BoldItalic.woff2") format("woff2"),
	  url("<?php echo get_stylesheet_directory_uri() ?>/src/fonts/poppins/Poppins-BoldItalic.woff") format("woff");
	font-weight: bold;
	font-style: italic;
 }
 
 @font-face {
	font-family: "Poppins";
	src: url("<?php echo get_stylesheet_directory_uri() ?>/src/fonts/poppins/Poppins-Semibold.woff2") format("woff2"),
	  url("<?php echo get_stylesheet_directory_uri() ?>/src/fonts/poppins/Poppins-Semibold.woff") format("woff");
	font-weight: 600;
	font-style: normal;
 }
 
 @font-face {
	font-family: "Poppins";
	src: url("<?php echo get_stylesheet_directory_uri() ?>/src/fonts/poppins/Poppins-SemiboldItalic.woff2") format("woff2"),
	  url("<?php echo get_stylesheet_directory_uri() ?>/src/fonts/poppins/Poppins-SemiboldItalic.woff") format("woff");
	font-weight: 600;
	font-style: italic;
 }
 
 @font-face {
	font-family: "Poppins";
	src: url("<?php echo get_stylesheet_directory_uri() ?>/src/fonts/poppins/Poppins-Regular.woff2") format("woff2"),
	  url("<?php echo get_stylesheet_directory_uri() ?>/src/fonts/poppins/Poppins-Regular.woff") format("woff");
	font-weight: normal;
	font-style: normal;
 }
 
 @font-face {
	font-family: "Poppins";
	src: url("<?php echo get_stylesheet_directory_uri() ?>/src/fonts/poppins/Poppins-Medium.woff2") format("woff2"),
	  url("<?php echo get_stylesheet_directory_uri() ?>/src/fonts/poppins/Poppins-Medium.woff") format("woff");
	font-weight: 500;
	font-style: normal;
 }
 
 @font-face {
	font-family: "Poppins";
	src: url("<?php echo get_stylesheet_directory_uri() ?>/src/fonts/poppins/Poppins-MediumItalic.woff2") format("woff2"),
	  url("<?php echo get_stylesheet_directory_uri() ?>/src/fonts/poppins/Poppins-MediumItalic.woff") format("woff");
	font-weight: 500;
	font-style: italic;
 }
/* -----------fonts------------------ */

        .cb-header {
}
.cb-header__inner {
  margin-top: 1rem;
  display: flex;
  align-items: center;
  justify-content: center;
  max-width: 1050px;
  margin: 0 auto;

  flex-direction: column;

  padding: 0 15px;
}

.cb-header__logo {
  flex: 3;
  display: flex;
  align-items: center;
  justify-content: center;
}
.cb-header__logo--link {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}
.cb-header__logo--img {
    height: 100px;
    max-height: 100px;
    max-width: min(100%,100%);
    width: auto;
    object-fit: contain;
    margin: 0 auto;
}

.cb-header__menu-block {
  flex: unset;
  width: 100%;
  display: flex;
  flex-direction: column;
  height: 0;
  transition: all 0.6s linear;
  overflow: hidden;
}
.cb-header__menu-block._open-menu{
  height: 250px;
}
.cb-header__menu {
  width: 100%;
  display: flex;
  align-items: flex-start;
  justify-content: flex-start;
  list-style: none;
  margin: 0;
  padding: 0;
  flex-wrap: wrap;

  flex-direction: column;
}

@media (min-width: 1024px) {
  .cb-header__inner {
    flex-direction: row;
    padding: 0;
  }
  .cb-header__logo--img {
    height: 180px;
    max-height: 180px;
}
.cb-header__menu-block {
  flex: 4;
  display: flex;
  flex-direction: column;
  height: 100%;
}
.cb-header__menu {
  align-items: center;
  flex-direction: row;
}


}
.cb-header__menu--item {
  width: 100%;
  display: flex;
}
.cb-header__menu--link {
  text-decoration: none;
  display: block;
  padding: 10px 0;

  font-family: "Poppins", sans-serif !important;
  color: #ea4a00;
  font-size: 18px;
  font-weight: normal;
  line-height: 1.2;
}
@media (min-width: 1024px) {
  .cb-header__menu--link {
    padding: 10px;
  }
  .cb-header__menu--item {
    width: unset;
    display: unset;
}
}

.cb-header__sell-yuor-house {
  /* padding: 2px 10px !important; */
  border-radius: 10px;
  background-color: #006cbf;
  padding:15px 20px ;

  font-family: "Poppins", sans-serif !important;
  color: #fff;
  font-size: 18px;
  font-weight: normal;
  line-height: 1;

  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  text-decoration: none;
}
@media (min-width: 1024px) {
  .cb-header__sell-yuor-house {
    width: max-content;
  }
}
.cb-header__mobile-nav {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  margin-bottom: .5rem;
  padding-top: .25em;
}
.cb-telephone-container {
  bottom: 0;
  left: 0;
  position: fixed;
  right: 0;
  text-align: right;
  z-index: 3;
  width: 100vw;
}
.cb-telephone-container:after {
  content: "";
  display: block;
  height: 32px;
  background: #ff651e;
}
.cb-triangle {
  height: 4vw;
  width: 100%;
  vertical-align: middle;
  overflow: hidden;
}
.cb-triangle-top {
}
.hl-triangle-poly-1 {
  fill: #ff651e;
}
.cb-telephone-text {
  font-size: 1.2em;
  position: absolute;
  right: 15px;
  /* top: 25%; */
  bottom: 10px;
}
.cb-contact-phone-text {
  color: #fff;
  font-size: 16px;
  font-weight: 700;
  text-align: right;
  font-family: 'Source Sans Pro',-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
}
.cb-contact-phone-text a{
  text-decoration: underline;
}

.cb-header__mobile-nav-link {
  font-family: "Poppins", sans-serif !important;
  color: #ea4a00; 
  /* padding: .2rem .4rem; */
  padding-top: 7px;
  display: block;
  position: relative;
  font-size: 14px;
  font-weight: 500;
  text-decoration: none;
}
.cb-header__mobile-nav-link:before {
  background: #e9ecef;
  content: "";
  display: block;
  height: 2px;
  position: absolute;
  top: 0;
  width: 35%;
}
.cb-header__mobile-toggler {
  font-family: "Poppins", sans-serif !important;
    background-color: transparent!important;
    /* background-color: var(--menu-toggle-bg)!important; */
    border: 1px solid rgba(0,0,0,.1);
    color: #000!important;
    /* color: var(--menu-toggle-c)!important; */
    border-radius: 5px;
    font-size: 16px;
    line-height: 1;
    padding: 5px 15px;
}
.cb-header__mobile-toggler:active:focus{
  box-shadow: 0 0 0 .2rem rgba(38,143,255,.5);
}
.cb-header__mobile-toggler:active{
    border-color: #038ea4;
}


.cb-header__menu {
  border-top: 2px solid #e9ecef;
  padding-top: 1em;
}
@media (min-width: 1024px) {
  .cb-header__menu {
    border-top: unset;
    padding-top: unset;
  }
  .cb-header__mobile-nav {
    display: none;
  }
}

    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
        	const wrapperButton = document.querySelector(".cb-header__mobile-nav");
        	const menu = document.querySelector(".cb-header__menu-block");
        	if (window.innerWidth < 1024) {
                console.log('mobile');
        		wrapperButton.addEventListener("click", (e) => {
        			const targetBatton = e.target.closest(".cb-header__mobile-toggler");
        			if (!targetBatton) return;
        			menu.classList.toggle("_open-menu");
                    console.log('click')
        		});
        	}
        });
    </script>
    <!--  -->
