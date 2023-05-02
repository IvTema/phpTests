<?php

/**
 * У нас есть массив недвижимости
 * Есть недвижимость для аренды и для продажи
 * Так же у нас есть массив с городами
 * Вывести на экран недвижимость для покупки в Стамбуле и Анкаре в формате
 * Istabul, 120 meters, cost 3000, not furniturised
 */
$houses = [
    'IST' => [
        'Rent' => [
            [
                'square' => 120,
                'cost' => 3000,
                'furniturised' => false
            ],
            [
                'square' => 100,
                'cost' => 2000,
                'furniturised' => true
            ]
        ],
        'Purchace' => [
            [
                'square' => 120,
                'cost' => 3000000,
                'furniturised' => false
            ],
            [
                'square' => 100,
                'cost' => 2000000,
                'furniturised' => true
            ],
            [
                'square' => 60,
                'cost' => 1000000,
                'furniturised' => true
            ]
        ]
    ],
    'MRM' => [
        'Rent' => [
            [
                'square' => 90,
                'cost' => 2000,
                'furniturised' => false
            ],
            [
                'square' => 110,
                'cost' => 2500,
                'furniturised' => true
            ]
        ],
        'Purchace' => [
            [
                'square' => 120,
                'cost' => 3000000,
                'furniturised' => false
            ],
            [
                'square' => 100,
                'cost' => 200000,
                'furniturised' => true
            ],
            [
                'square' => 60,
                'cost' => 1000000,
                'furniturised' => true
            ]
        ]

    ],
    'ANK' => [
        'Rent' => [
            [
                'square' => 120,
                'cost' => 3000,
                'furniturised' => false
            ],
            [
                'square' => 100,
                'cost' => 2000,
                'furniturised' => true
            ]
        ],
        'Purchace' => [
            [
                'square' => 120,
                'cost' => 3000000,
                'furniturised' => false
            ],
            [
                'square' => 100,
                'cost' => 2000000,
                'furniturised' => true
            ],
            [
                'square' => 60,
                'cost' => 1000000,
                'furniturised' => true
            ]
        ]
    ]
];

$cities = [
    'IST' => 'Istanbul',
    'MRM' => 'Marmaris',
    'ANK' => 'Ankara'
];


// Istabul, 120 meters, cost 3000, not furniturised

foreach ($houses as $city_code => $offer_status){
    $furniturised = $offer_status['Purchace']['furniturised'];
    if (($cities[$city_code] == 'Istanbul' or 'Ankara') and !$furniturised){
        $dealtipe = $offer_status['Purchace'];
        $square = $offer_status['Purchace']['square'];
        $cost = $offer_status['Purchace']['cost'];
        var_dump($dealtipe);
        echo "{$city}, {$square} meters, {$cost} 3000, not furniturised";
    }
}
