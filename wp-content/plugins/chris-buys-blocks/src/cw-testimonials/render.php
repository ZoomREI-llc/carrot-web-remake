<?php
$selectedName = isset($attributes['selectedName']) ? $attributes['selectedName'] : 'Chris';

$testimonials = [
    [
        'img' => 'nataly-lebedev',
        'name' => 'Nataly Lebedev',
        'text' => '<p>“In a day and age where professionals in the service industry never seem to answer their phones or return calls, <strong>:selectedName promptly responded to my initial call, and was always available during the entire selling process."</strong></p>'
    ],
    [
        'img' => 'liv-skyler',
        'name' => 'Liv Skyler',
        'text' => '<p>"We are very grateful for :selectedName and his team\'s work. They were always professional and reliable, </br></br><strong>:selectedName answered my first call right away</strong> and kept me updated throughout the whole selling process.”</p>'
    ],
    [
        'img' => 'darren-pilch',
        'name' => 'Darren Pilch',
        'text' => '<p>"<strong>I am quite happy with the easy, fast, stress-free process of dealing with :selectedName.</strong> I needed to rehab this property that sat vacant too long.</br></br> He made a reasonable offer and the sale went quickly with prompt payment."</p>'
    ],
    [
        'img' => 'shaked-elnatan',
        'name' => 'Shaked Elnatan',
        'text' => '<p>“<strong>Great experience working</strong> with :selectedName and the team. They were incredibly professional and sold our home quickly for a price we were satisfied with."</p>'
    ],
    [
        'img' => 'leigh-williams',
        'name' => 'Leigh Williams',
        'text' => '<p>"<strong>The customer service experience with :selectedName was outstanding.</strong> From beginning to end, the process of selling my home was exemplary."</p>'
    ],
    [
        'img' => 'gregory-marks',
        'name' => 'Gregory Marks',
        'text' => '<p>”Managing a property from out of state became too much, and I needed to sell quickly. <strong>:selectedName handled everything seamlessly</strong>, and I couldn\'t be happier with how smoothly the sale went. They truly made it effortless."</p>'
    ]
];
?>

<section id='reviews' class="cw-testimonials inter-font">
    <div class="grid-container">
        <header class="cw-testimonials__header">
            <div class="pre-title">
                <span>client reviews</span>
            </div>
            <div class="cw-testimonials__title title-2">
                <h2>What People Are Saying</h2>
            </div>
            <div class="sub-title">
                <p>Fast sales, helpful & professional, zero hassle. 96% of sellers love our service - here’s what our clients have to say.</p>
            </div>
        </header>
        <div class="cw-testimonials__slider">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($testimonials as $testimonial): ?>
                        <blockquote class="swiper-slide cw-testimonials__slide">
                            <div class="cw-testimonials__slide-top">
                                <div class="cw-testimonials__slide-img">
                                    <?= get_responsive_image('cw-testimonials/'.$testimonial['img'], 'Avatar'); ?>
                                </div>
                                <div class="cw-testimonials__slide-author">
                                    <div class="cw-testimonials__slide-stars">
                                        <?php for ($i=1; $i <= 5; $i++){
                                            echo get_responsive_image('cw-testimonials/star', 'star');
                                        } ?>
                                    </div>
                                    <div class="cw-testimonials__slide-title">
                                        <cite><?= $testimonial['name'] ?></cite>
                                    </div>
                                    <span class="cw-testimonials__slide-verified">Verified Customer</span>
                                </div>
                            </div>
                            <div class="cw-testimonials__slide-text">
                                <?= str_replace(':selectedName', $selectedName, $testimonial['text']) ?>
                            </div>
                        </blockquote>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-nav">
                    <button type="button" class="swiper-arrow js-swiper-prev" title="Prev" aria-label="Prev"></button>
                    <div class="swiper-pagination">
                    
                    </div>
                    <button type="button" class="swiper-arrow js-swiper-next" title="Next" aria-label="Next"></button>
                </div>
            </div>
        </div>
    </div>
</section>