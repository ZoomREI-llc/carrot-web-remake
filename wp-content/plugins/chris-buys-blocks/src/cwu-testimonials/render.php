<?php

$testimonials = [
    [
        'img' => 'nataly-lebedev',
        'name' => 'Nataly Lebedev',
        'text' => '<p>“In a day and age where professionals in the service industry never seem to answer their phones or return calls, <strong>[company_short] promptly responded to my initial call, and was always available during the entire selling process."</strong></p>'
    ],
    [
        'img' => 'liv-skyler',
        'name' => 'Liv Skyler',
        'text' => '<p>"We are very grateful for [company_short] and his team\'s work. They were always professional and reliable, </br></br><strong>[company_short] answered my first call right away</strong> and kept me updated throughout the whole selling process.”</p>'
    ],
    [
        'img' => 'darren-pilch',
        'name' => 'Darren Pilch',
        'text' => '<p>"<strong>I am quite happy with the easy, fast, stress-free process of dealing with [company_short].</strong> I needed to rehab this property that sat vacant too long.</br></br> He made a reasonable offer and the sale went quickly with prompt payment."</p>'
    ],
    [
        'img' => 'shaked-elnatan',
        'name' => 'Shaked Elnatan',
        'text' => '<p>“<strong>Great experience working</strong> with [company_short] and the team. They were incredibly professional and sold our home quickly for a price we were satisfied with."</p>'
    ],
    [
        'img' => 'leigh-williams',
        'name' => 'Leigh Williams',
        'text' => '<p>"<strong>The customer service experience with [company_short] was outstanding.</strong> From beginning to end, the process of selling my home was exemplary."</p>'
    ],
    [
        'img' => 'gregory-marks',
        'name' => 'Gregory Marks',
        'text' => '<p>”Managing a property from out of state became too much, and I needed to sell quickly. <strong>[company_short] handled everything seamlessly</strong>, and I couldn\'t be happier with how smoothly the sale went. They truly made it effortless."</p>'
    ]
];
?>

<section id='reviews' class="cwu-testimonials inter-font">
    <div class="grid-container">
        <header class="cwu-testimonials__header">
            <div class="pre-title">
                <span>client reviews</span>
            </div>
            <div class="cwu-testimonials__title title-2">
                <h2>What Our Customers Are Saying</h2>
            </div>
            <div class="sub-title">
                <p>96% of Our Customers Rate Their Experience as Excellent.</p>
            </div>
        </header>
        <div class="cwu-testimonials__slider">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($testimonials as $testimonial): ?>
                        <blockquote class="swiper-slide cwu-testimonials__slide">
                            <div class="cwu-testimonials__slide-top">
                                <div class="cwu-testimonials__slide-img">
                                    <?= get_responsive_image('cwu-testimonials/'.$testimonial['img'], 'Avatar'); ?>
                                </div>
                                <div class="cwu-testimonials__slide-author">
                                    <div class="cwu-testimonials__slide-stars">
                                        <?php for ($i=1; $i <= 5; $i++){
                                            echo get_responsive_image('cwu-testimonials/star', 'star');
                                        } ?>
                                    </div>
                                    <div class="cwu-testimonials__slide-title">
                                        <cite><?= $testimonial['name'] ?></cite>
                                    </div>
                                    <span class="cwu-testimonials__slide-verified">Verified Customer</span>
                                </div>
                            </div>
                            <div class="cwu-testimonials__slide-text">
                                <?= $testimonial['text'] ?>
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