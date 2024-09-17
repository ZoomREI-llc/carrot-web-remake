<?php

$phoneNumber = isset($attributes['phoneNumber']) ? esc_html($attributes['phoneNumber']) : '';

$formId = isset($attributes['formId']) ? esc_attr($attributes['formId']) : '1';




$clients = array(
    array(
       "name" => "Randall from Warsaw, Missouri",
       "time" => "3 days",
       "imgUrl" => "https://firebasestorage.googleapis.com/v0/b/proof-f6589.appspot.com/o/maps2%2F9e964311ff3c9dad9a25a8b9333e202b.png.png?alt=media",
    ),
    array(
       "name" => "Teresa from Kansas City, Missouri",
       "time" => "20 dayz",
       "imgUrl" => "https://firebasestorage.googleapis.com/v0/b/proof-f6589.appspot.com/o/maps2%2F6a2d350781af38f677bd9a98f818e275.png.png?alt=media",
    ),
    array(
       "name" => "Quincy from Kansas City, Missouri",
       "time" => "5 days",
       "imgUrl" => "https://firebasestorage.googleapis.com/v0/b/proof-f6589.appspot.com/o/maps2%2Fcb7dc7cf6f21b94bc8f3bc0bc35fc7db.png.png?alt=media",
    ),

)

?>

<section class="cb-popup-link-get-a-cash-offer__wrapper">
    <div class="cb-popup-link-get-a-cash-offer__inner">
     <?php foreach ($clients as $client) : ?>
        <a href="/get-a-cash-offer" class="cb-popup-link-get-a-cash-offer__link">
            <img src="<?php echo esc_url($client['imgUrl']) ?>" alt="" class="cb-popup-link-get-a-cash-offer__map">
            <div class="cb-popup-link-get-a-cash-offer__content">
                <div class="cb-popup-link-get-a-cash-offer__content--name">
                    <?php echo wp_kses_post($client['name']); ?>
                </div>
                <div class="cb-popup-link-get-a-cash-offer__content--text">Received a Cash Offer in 7 Minutes</div>
                <div class="cb-popup-link-get-a-cash-offer__content--footer">
                   <?php echo wp_kses_post($client['time']); ?> ago
                </div>
            </div>
        </a>
     <?php endforeach; ?> 
    </div>
</section>
