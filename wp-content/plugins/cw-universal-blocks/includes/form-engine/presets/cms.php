<?php
return [
    [
        "field" => "fullName",
        "key" => "full_name"
    ],
    [
        "field" => "phone",
        "key" => "phone"
    ],
    [
        "field" => "email",
        "key" => "email"
    ],
    
    
    
    
    // Address
    [
        "field" => "propertyAddress",
        "key" => "full_address"
    ],
    [
        "field" => "street",
        "key" => "street"
    ],
    [
        "field" => "city",
        "key" => "city"
    ],
    [
        "field" => "state",
        "key" => "state"
    ],
    [
        "field" => "zipcode",
        "key" => "zipcode"
    ],
    [
        "field" => "country",
        "default" => "US",
        "key" => "country"
    ],
    
    
    
    // CONTACT US fields
    [
        "field" => "message",
        "key" => "message"
    ],
    [
        "field" => "heard_about_us",
        "key" => "hear_about_us"
    ],
    
    
    
    
    // STEP 2 Fields
    [
        "field" => "bedrooms",
        "key" => "number_of_bedrooms"
    ],
    [
        "field" => "bathrooms",
        "key" => "number_of_bathrooms"
    ],
    [
        "field" => "garage",
        "key" => "garage"
    ],
    [
        "field" => "basement",
        "key" => "basement"
    ],
    [
        "field" => "owned",
        "key" => "property_owned_duration"
    ],
    [
        "field" => "condition",
        "key" => "property_condition"
    ],
    [
        "field" => "repairs",
        "key" => "required_repairs"
    ],
    [
        "field" => "living",
        "key" => "has_occupants"
    ],
    [
        "field" => "realtor",
        "key" => "is_listed_with_realtor"
    ],
    [
        "field" => "fast",
        "key" => "needs_fast_sale"
    ],
    [
        "field" => "soon",
        "key" => "sale_timeframe"
    ],
    [
        "field" => "price",
        "key" => "asking_price"
    ],
    [
        "field" => "reason",
        "key" => "sale_reason"
    ],
    [
        "field" => "goal",
        "key" => "sale_goal"
    ],
    [
        "field" => "landline",
        "key" => "landline_phone"
    ],
    [
        "field" => "bestTime",
        "key" => "best_time_to_call"
    ],
    
    
    
    // Technical form fields
    [
        "field" => "timestamp",
        "key" => "timestamp"
    ],
    [
        "field" => "referrer",
        "key" => "referrer"
    ],
    [
        "field" => "lead_source",
        "key" => "lead_source"
    ],
    [
        "field" => "entry_id",
        "key" => "entry_id"
    ],
    [
        "field" => "user_ip",
        "default" => $ip ?? '',
        "key" => "user_ip"
    ],
    [
        "field" => "page_url",
        "key" => "page_url"
    ],
    [
        "field" => "form_name",
        "key" => "form_name"
    ],
    [
        "field" => "popup",
        "default" => false,
        "key" => "popup"
    ],
    [
        "field" => "market_code",
        "key" => "market_code"
    ],
    [
        "field" => "user_agent",
        "key" => "user_agent"
    ],
    
    
    //  UTM's
    [
        "field" => "client_id",
        "key" => "ga_cid"
    ],
    [
        "field" => "session_id",
        "key" => "ga_sid"
    ],
    [
        "field" => "utm_source",
        "key" => "utm_source"
    ],
    [
        "field" => "utm_campaign",
        "key" => "utm_campaign"
    ],
    [
        "field" => "utm_term",
        "key" => "utm_term"
    ],
    [
        "field" => "device",
        "key" => "device"
    ],
    [
        "field" => "gclid",
        "key" => "gclid"
    ],
    [
        "field" => "fbclid",
        "key" => "fbclid"
    ],
    [
        "field" => "msclkid",
        "key" => "msclkid"
    ],
];