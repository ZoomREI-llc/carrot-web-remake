<?php
$selected_market = esc_html($attributes['selectedMarket']);
$market_link = esc_url($attributes['marketLink']);
?>

<section class="cb-home-no-inspectors">
    <p>
        When selling a property to “<?php echo $selected_market; ?>”,
        <strong>you don’t need to <a href="<?php echo $market_link; ?>">deal with inspectors</a></strong>, asking you to repair things just because they are older. You also
        don’t need to clean once you moved out, just
        <strong>leave unwanted things behind</strong> – We’ll either donate it
        or get rid of it for you!
    </p>
</section>