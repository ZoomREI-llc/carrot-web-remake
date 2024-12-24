<?php
    $faqs = $attributes['faqs'] ?: [];
    
    if(!function_exists('generate_anchor_id')) {
        function generate_anchor_id($text)
        {
            $text = strtolower($text);
            $text = preg_replace('/[^a-z0-9\s]/', '', $text);
            $text = str_replace(' ', '-', $text);
            $text = preg_replace('/-+/', '-', $text);
            $text = trim($text, '-');
        
            return $text;
        }
    }
?>

<section class="faq-accordions body-gray">
    <div class="grid-container">
        <div class="faq-accordions__container">
            <div class="faq-accordions-title">
                <h1 class="title-1">Frequently Asked Questions</h1>
            </div>
            <div class="faq-accordions-description">
                <h3 class="sub-title">Selling your house to us is easy - let’s make it even easier!
                    <br>
                    Here are answers to the questions we get asked the most.
                </h3>
            </div>
            <div class="faq-accordions-info">
                <?php foreach ($faqs as $category) : ?>
                    <a href="#<?php echo generate_anchor_id($category['category']) ?>" class="faq-accordions-rounds__element">
                        <?php echo get_responsive_image('faq-accordions/'.$category['icon'], 'Icon') ?>
                        <span><?php echo $category['category']; ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="faq-accordions-dpl">
                <span class="output-text">Categories</span>
                <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.837757 1.21358C0.509995 1.55202 0.509936 2.08949 0.837624 2.42801L5.70394 7.45513C6.48786 8.26215 7.75492 8.26215 8.53885 7.45513L13.4121 2.42135C13.7398 2.08286 13.7396 1.54539 13.4118 1.20707C13.0688 0.853126 12.5009 0.853276 12.1581 1.2074L7.32416 6.20085C7.21217 6.31641 7.03089 6.31641 6.91917 6.20085L2.09207 1.21375C1.74908 0.859386 1.18084 0.85931 0.837757 1.21358Z" fill="#2B3849"></path>
                </svg>
                <ul>
                    <?php foreach ($faqs as $category) : ?>
                        <li><a href="#<?php echo generate_anchor_id($category['category']) ?>"><?= esc_html( $category['category'] ) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        
            <?php foreach ($faqs as $category) : ?>
                <div class="faq-accordions-accordions" id="<?php echo generate_anchor_id($category['category']) ?>">
                    <div class="faq-accordions-breakpoint">
                        <h2 class="title-2"><?php echo esc_html($category['category']); ?></h2>
                    </div>
                    <?php foreach ($category['items'] as $faq) : ?>
                        <div class="faq-accordions-accordion">
                            <div class="faq-question faq-accordions-question">
                                <span><?php echo esc_html($faq['question']); ?></span>
                                <div class="faq-accordions-question__img">
                                    <?php echo get_responsive_image('faq-accordions/arrow', 'Icon') ?>
                                </div>
                            </div>
                            <div class="faq-accordions-answer">
                                <div class="faq-accordions-answer__content">
                                    <p><?php echo wp_kses_post($faq['answer']); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
