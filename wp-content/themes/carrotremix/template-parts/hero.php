<?php
$site_data = cbh_get_site_data();
$market_code = $site_data['market_code'];

$phone_numbers = [
    'sf'  => '(510) 283-9871',
    'stl' => '(314) 334-1481',
    'kc'  => '(816) 720-7760',
    'det' => '(313) 217-9851',
    'cle' => '(216) 677-2169',
    'ind' => '(317) 526-4712',
];

$phoneNumber = isset($phone_numbers[$market_code]) ? $phone_numbers[$market_code] : '';
$background_image_url = get_bloginfo('template_directory') . '/src/assets/hero-background/background-' . $market_code . '.webp';
?>

<style>
    :root {
        --background-image: url('<?php echo $background_image_url; ?>');
    }
</style>

<section class="hero-wrapper">
    <svg class="hero__triangle top" viewBox="0 0 100 100" preserveAspectRatio="none">
        <polygon points="0,0 100,0 0,100" />
    </svg>

    <div class="hero">
        <div class="hero__top">
            <div class="hero__call-us">
                Call Us! <a href="tel:<?php echo $phoneNumber; ?>"><?php echo $phoneNumber; ?></a>
            </div>
            <a href="<?php echo site_url() ?>/get-a-cash-offer-today/" class="hero__top--nav-link">Get A Cash Offer Today</a>
        </div>

        <div class="hero__content">
        </div>
    </div>

    <svg class="hero__triangle bottom" viewBox="0 0 100 100" preserveAspectRatio="none">
        <polygon points="0,100 100,100 100,0" />
    </svg>
</section>