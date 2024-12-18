<?php
// $formId = isset($attributes['formId']) ? esc_html($attributes['formId']) : '1';
$selectedMarket = isset($attributes['selectedMarket']) ? esc_html($attributes['selectedMarket']) : 'St. Louis, Missouri';

// Determine the name based on the selected market
if ($selectedMarket === "the Bay Area") {
    $selectedName = "John";
} else {
    $selectedName = "Chris";
}

if(!function_exists('getDynamicTextsByTerm')) {
    function getDynamicTextsByTerm($default_title = '', $default_text = '')
    {
        $title = $default_title;
        $text = $default_text;
        $term = isset($_GET['utm_term']) ? strtolower($_GET['utm_term']) : false;
        
        if ($term) {
            $dynamic_texts = include plugin_dir_path(__FILE__) . 'includes/conditions.php';
            
            foreach ($dynamic_texts as $dynamic_text) {
                $conditions = $dynamic_text['conditions'];
                $match = [];
                
                foreach ($conditions as $condition) {
                    $keywords = $condition['keywords'];
                    $variables = $condition['variables'] ?? true;
                    
                    foreach ($keywords as $keyword) {
                        if (str_contains($term, $keyword)) {
                            $match = $variables;
                            break;
                        }
                    }
                    
                    if ($match) {
                        break;
                    }
                }
                
                if ($match) {
                    $title = $dynamic_text['title'] ?: $title;
                    $text = $dynamic_text['text'] ?: $text;
                    
                    if (is_array($match)) {
                        foreach (array_keys($match) as $var_name) {
                            $title = str_replace('{' . $var_name . '}', $match[$var_name], $title);
                            $text = str_replace('{' . $var_name . '}', $match[$var_name], $text);
                        }
                    }
                    
                    break;
                }
            }
        }
        
        return [
            'title' => $title,
            'text'  => $text
        ];
    }
}

$default_title = 'We Buy ANY House In <span>ANY Condition, On YOUR Timeline</span>';
$default_text = 'House to sell in '. esc_html($selectedMarket) . '? <strong>Get a cash offer in just 7 minutes</strong>, and get the sale closed as soon as you want to.';

$texts = getDynamicTextsByTerm($default_title, $default_text);
?>

<section class="cw-hero-wrapper inter-font" style="
    --background-image-small: url('<?php echo get_image_url('cw-hero/life-changes-hero-background', 768); ?>');
    --background-image-medium: url('<?php echo get_image_url('cw-hero/life-changes-hero-background', 1024); ?>');
    --background-image-large: url('<?php echo get_image_url('cw-hero/life-changes-hero-background', 2048); ?>');
    ">
    <div class="cw-hero__content grid-container">
        <div class="cw-hero__reviews">
            <div class="cw-hero__reviews-stars-wrapper">
                <?php for ($i = 0; $i < 5; $i++): ?>
                    <span class="cw-hero__star"><?php echo get_responsive_image('cw-hero/star', 'star'); ?></span>
                <?php endfor; ?>
            </div>
            <div class="cw-hero__reviews-text">
                <p>Rated <strong>4.7/5</strong> | Based on <strong>100+</strong> reviews</p>
            </div>
        </div>
        <h1 class="cw-hero__title title-1"><?= $texts['title'] ?></h1>
        <div id="cw-form" class="cw-hero__form">
            <div class="cw-hero__form-title">
                <span>Get Your Offer In Record Time</span>
            </div>
            <div class="cw-hero__form-subtitle">
                <span>Fill out the form. We’ll contact you ASAP.</span>
            </div>
            <?php echo $content; ?>

            <div class="lead-form__disclaimer">
                <p>Your Information is safe & secure</p>
            </div>
        </div>
        <h3 class="cw-hero__subtitle"><?= $texts['text'] ?></h3>
        <ul class="cw-hero__bullet-points">
            <li class="cw-hero__bullet-point"><?php echo get_responsive_image('cw-hero/check-circle', 'checkmark'); ?>
                <span><strong>No need for you to clean</strong> or make repairs</span>
            </li>
            <li class="cw-hero__bullet-point"><?php echo get_responsive_image('cw-hero/check-circle', 'checkmark'); ?>
                <span>No realtors, <strong>fees, banks, commissions,</strong> or inspectors</span>
            </li>
            <li class="cw-hero__bullet-point"><?php echo get_responsive_image('cw-hero/check-circle', 'checkmark'); ?>
                <span>We pay all closing costs - <strong>you pay nothing</strong></span>
            </li>
        </ul>
        <div class="cw-hero__content--footer">
            <div class="cw-fresh-start__testimonial">
                <?php echo get_responsive_image('cw-hero/hero-testimoniels', 'Leigh Williams', 'cw-fresh-start__testimonee'); ?>
                <div class="cw-fresh-start__testimonial--content">
                    <blockquote>
                        <p>"We are very grateful for <?php echo esc_html($selectedName); ?> and his team's work. They were always professional and reliable, <?php echo esc_html($selectedName); ?> answered my first call right away and kept me updated throughout the whole selling process.”</p>
                        <cite>
                            <span>Liv Skyler</span>
                            <div class="cw-hero__reviews-stars-wrapper">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <span class="cw-hero__star"><?php echo get_responsive_image('cw-hero/star', 'star'); ?></span>
                                <?php endfor; ?>
                            </div>
                        </cite>
                    </blockquote>
                </div>
            </div>
            <ul class="cw-hero__statistic--list">
                <li class="cw-hero__statistic--item">
                    <div class="cw-hero__statistic--amunt">$36M+</div>
                    <div class="cw-hero__statistic--text">Saved <span>Fees</span></div>
                </li>
                <li class="cw-hero__statistic--item">
                    <div class="cw-hero__statistic--amunt">1,500+</div>
                    <div class="cw-hero__statistic--text">HOUSES <span>BOUGHT</span></div>
                </li>
                <li class="cw-hero__statistic--item">
                    <div class="cw-hero__statistic--amunt">96%</div>
                    <div class="cw-hero__statistic--text">SATISFIED <br><span>CUSTOMERS</span></div>
                </li>
            </ul>
        </div>
    </div>
</section>