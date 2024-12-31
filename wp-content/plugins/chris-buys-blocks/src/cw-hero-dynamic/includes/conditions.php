<?php
return [
    [
        'conditions' => [
            [
                'keywords'  => ['san francisco'],
                'variables' => [
                    'market' => 'San Francisco'
                ]
            ],
            [
                'keywords'  => ['st. louis', 'st louis', 'saint louis'],
                'variables' => [
                    'market' => 'St. Louis'
                ]
            ],
            [
                'keywords'  => ['kansas city'],
                'variables' => [
                    'market' => 'Kansas City'
                ]
            ],
            [
                'keywords'  => ['detroit'],
                'variables' => [
                    'market' => 'Metro Detroit'
                ]
            ],
            [
                'keywords'  => ['cleveland'],
                'variables' => [
                    'market' => 'Cleveland'
                ]
            ],
            [
                'keywords'  => ['indianapolis'],
                'variables' => [
                    'market' => 'Indianapolis'
                ]
            ]
        ],
        'title'      => 'We’re Your {market} Home-Buying Experts <span>—Sell Quickly & Locally!</span>',
        'text'       => 'House to sell in {market}? Get a cash offer in just 7 minutes, and get the sale closed as soon as you want to.'
    ],
    [
        'conditions' => [
            [
                'keywords' => ['cash']
            ]
        ],
        'title'      => 'Turn Your House Into Cash <span>Quick, Easy, and On Your Terms</span>',
        'text'       => 'Don\'t worry about repairs or timing.<br> Get a fair cash offer and close on your schedule.<br> Discover hassle-free home selling!'
    ],
    [
        'conditions' => [
            [
                'keywords' => ['fast', 'quick', 'asap', 'now']
            ]
        ],
        'title'      => 'Need to Sell Your House Quickly? <span>We Will Buy It Fast, In Any Condition, With No Complications!</span>',
        'text'       => 'Say goodbye to long waiting periods and complex processes. <br>We’re your quick, reliable solution for selling your home effortlessly.'
    ],
    [
        'conditions' => [
            [
                'keywords' => ['foreclosure']
            ]
        ],
        'title'      => 'Stop Foreclosure in Its Tracks <span>– Sell Your Home Fast!</span>',
        'text'       => 'Don\'t let foreclosure take away your peace of mind.<br> Act now and sell your house before it\'s too late.<br> We provide a quick sale solution to help you avoid foreclosure.'
    ],
    [
        'conditions' => [
            [
                'keywords' => ['ugly', 'as is', 'as-is', 'inherited', 'distressed']
            ]
        ],
        'title'      => 'Sell Your House \'As Is\' <span>– Hassle-Free, Immediate Cash Offers!</span>',
        'text'       => 'Forget repairs and renovations; we buy your house as it stands.<br> Get a fair cash offer and sell your property on your terms, quickly and effortlessly.'
    ],
    [
        'conditions' => [
            [
                'keywords' => ['sell']
            ]
        ],
        'title' => 'Ready to Sell Your House? <span>We Buy Houses As-Is, On Your Timeline.</span>',
        'text'  => 'Selling your house in {market} is easy. Receive a fair cash offer in minutes and close as soon as you want.'
    ],
];
