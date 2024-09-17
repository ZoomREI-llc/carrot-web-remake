<?php
$selected_market = esc_html($attributes['selectedMarket']);
$phoneNumber = isset($attributes['phoneNumber']) ? esc_html($attributes['phoneNumber']) : '';
$formId = isset($attributes['formId']) ? esc_attr($attributes['formId']) : '1';
?>

<section class="cb-oc-page-call-us">
    
     <h2 class=""><strong>Call Us Today!</strong> 
        <br><a href="tel:<?php echo $phoneNumber; ?>"><?php echo $phoneNumber; ?></a>
      </h2>

     <div class="cb-oc-page-call-us__form-wrapper">
        <?php echo do_shortcode('[gravityform id="' . $formId . '" title="false" ajax="true"]'); ?>
     </div>
 
</section>