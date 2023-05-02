<?php
class Beer {
    public $type;
    public $container;
    public $volume;
    public $price;
    public $basicPrice;
    public $timeUntilUnsuitability = 10;
    public $priceCoefficient = 1;

    public function __construct($type, $container, $volume, $price) {
        $this->type = $type;
        $this->container = $container;
        $this->volume = $volume;
        $this->basicPrice = $price;
        $this->price = $price;
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
            new Beer('lager', 'aluminium', 0.5, 100),
            new Beer('wheat', 'glass', 0.5, 150),
            new Beer('dark', 'aluminium', 0.5, 110)
        ]),
        'Abdula' => new Shop([
            new Beer('dark', 'glass', 2, 200),
            new Beer('wheat', 'glass', 0.5, 150),
            new Beer('dark', 'aluminium', 0.5, 110)
        ])
    ],
    'Istanbul' => [
        'Ahmed' => new Shop([
            new Beer('lager', 'glass', 1, 100),
            new Beer('lager', 'aluminium', 0.5, 150),
            new Beer('wheat', 'aluminium', 0.5, 110)
        ]),
        'Burak' => new Shop([
            new Beer('wheat', 'glass', 0.5, 200),
            new Beer('wheat', 'aluminium', 1, 250),
            new Beer('dark', 'aluminium', 0.5, 110)
        ])
    ],
    'Ankara' => [
        'Rejep' => new Shop([
            new Beer('wheat', 'glass', 2, 300),
            new Beer('lager', 'aluminium', 0.5, 150),
            new Beer('wheat', 'aluminium', 0.5, 110)

        ]),
        'Muamar' => new Shop([
            new Beer('wheat', 'glass', 2, 100),
            new Beer('lager', 'aluminium', 1, 150),
            new Beer('wheat', 'aluminium', 1, 110)
        ])
    ]
];


$lagers=[];
$counter=0;
$summ=0;
$midle=0;
foreach ($shops as $sity) {
    foreach ($sity as $seller) {
        //print_r($seller->assortiment);
        foreach ($seller->assortiment as $beer) {
            //print_r($beer);
            if ($beer->type=='lager') {
                //print_r($beer);
                $summ += $beer->price;
                $counter++;
            }
        }
    }
}
//print_r($summ/$counter);

// самое дорогое пиво в аллюминевой банке в стамбуле

$beer_price;
$so_beer_much_expensive;
foreach ($shops as $sity=>$sellers) {
    //var_dump($sity);
    if ($sity=='Istanbul'){
        foreach ($sellers as $seller) {
            //var_dump($seller->assortiment);
            foreach ($seller->assortiment as $beer) {
                //var_dump($beer);
                if ($beer->container=='aluminium') {
                    //var_dump($beer);
                     if ($beer->price > $beer_price){
                        $beer_price = $beer->price;
                        $so_beer_much_expensive = $beer->type;
                     }
                }
            }
        }
    }
}
//var_dump($so_beer_much_expensive);

