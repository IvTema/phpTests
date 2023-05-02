<?php 
print_r($_POST[$basketName]);
$total = 0;
foreach ($food as $key => $dish) {
    $basketName = 'basket_' . $key;
    $double = 'checkbox_' . $key;
    $price = $dish['price'];
    if (isset($_POST[$basketName])) {
        // echo $dish['name'] . " " . $dish['price'] . '<br>';

        if (isset($_POST[$double])) {
            // var_dump(21111);
            $price = $price * 2;
        }
    
        if (isset($_POST[$basketName])) {
            // $total += $dish['price'];
            $total += $price;
        }
        echo $dish['name'] . " " . $price. '<br>';
    }
   
    
}
var_dump($_POST);
echo "Сумма заказа " . $total . " лир";