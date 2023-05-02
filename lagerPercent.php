<?php
class Beer {
    public $type;
    public $container;
    public $volume;
    public $price;
    public $basicPrice;
    public $timeUntilUnsuitability = 10;
    public $priceCoefficient = 1;
    public $soldCount;

    public function __construct($type, $container, $volume, $price, $soldCount) {
        $this->type = $type;
        $this->container = $container;
        $this->volume = $volume;
        $this->basicPrice = $price;
        $this->price = $price;
        $this->soldCount = $soldCount;
    }

    public function reduceUnsuitability($months) {
        $this->timeUntilUnsuitability -= $months;
    }

    public function recountPrice() {
        if ($this->timeUntilUnsuitability <= 0) {
            $this->price = 0;
        } else {
            $this->price = $this->basicPrice * $this->timeUntilUnsuitability / 10;
        }
    }
    
    public function getPriceForLiter() {
        return $this->price/$this->volume;
    }
}


class Shop {
    public $shopName;
    public $assortiment = [];

    public function __construct($assortiment) {
        $this->assortiment = $assortiment;
    }
    
    public function addItemToAssortiment($beer) {
        $this->assortiment[] = $beer;
    }

    public function addMonthToBeer() {
        foreach ($this->assortiment as $beer) {
            $beer->reduceUnsuitability(1);
        } 
    }
}

$shops = [
    'Marmaris' => [
        'Mustafa' => new Shop([
            new Beer('lager', 'aluminium', 0.5, 100, 3),
            new Beer('wheat', 'glass', 0.5, 150, 4),
            new Beer('dark', 'aluminium', 0.5, 110, 1)
        ]),
        'Abdula' => new Shop([
            new Beer('dark', 'glass', 2, 200, 2),
            new Beer('wheat', 'glass', 0.5, 150, 2),
            new Beer('dark', 'aluminium', 0.5, 110, 2)
        ])
    ],
    'Istanbul' => [
        'Ahmed' => new Shop([
            new Beer('lager', 'glass', 1, 100, 3),
            new Beer('lager', 'aluminium', 0.5, 150, 3),
            new Beer('wheat', 'aluminium', 0.5, 110, 5)
        ]),
        'Burak' => new Shop([
            new Beer('wheat', 'glass', 0.5, 200, 7),
            new Beer('wheat', 'aluminium', 1, 250, 5),
            new Beer('dark', 'aluminium', 0.5, 110, 4)
        ])
    ],
    'Ankara' => [
        'Rejep' => new Shop([
            new Beer('wheat', 'glass', 2, 300, 1),
            new Beer('lager', 'aluminium', 0.5, 150, 1),
            new Beer('wheat', 'aluminium', 0.5, 110, 3)

        ]),
        'Muamar' => new Shop([
            new Beer('wheat', 'glass', 2, 100, 3),
            new Beer('lager', 'aluminium', 1, 150, 2),
            new Beer('wheat', 'aluminium', 1, 110, 1)
        ])
    ]
];


foreach ($shops as $cityName=>$cityShops) {
    foreach ($cityShops as $marketname=>$market) {
        $totalSales = 0;
        $typeSold = [];
        $assortiment = $market->assortiment;
        foreach ($assortiment as $bira) {
            $soldAmountForBira = $bira->price*$bira->soldCount;
            $totalSalesForMarket += $soldAmountForBira;
            $type = $bira->type;
            if (!isset($typeSales[$type])) {
                $typeSales[$type] = 0;
            }
            $typeSales[$type]+=$soldAmountForBira;
        }
        foreach($typeSales as $type=>$salesForType){
            if ($cityName == 'Ankara' || $cityName == 'Marmaris'){
            // echo $marketname. ' ' . $type. ' ' . (round($salesForType/$totalSalesForMarket*100, 2)). '%'. '</br>';
            }
        }
    }
}

// ограничить анкарой и мармарисом

//1) Необходимо вывести на экран самое дешевое пиво каждого типа (Например lager 100 - Ankara, Rejep)
//2) Необходимо найти и вывести % продаж от общего чека каждого типа пива для каждого города

