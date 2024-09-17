<?php
$selected_market = esc_html($attributes['selectedMarket']);


$formId = isset($attributes['formId']) ? esc_attr($attributes['formId']) : '1';
?>

<section class="cb-hiw-are-you-ready-to-get-cash">
    
    <h2>Are You Ready To Get Cash For Your House?</h2>
     <div class="cb-hiw-are-you-ready-to-get-cash__form-wrapper">
        <?php echo do_shortcode('[gravityform id="' . $formId . '" title="false" ajax="true"]'); ?>
     </div>

</section>