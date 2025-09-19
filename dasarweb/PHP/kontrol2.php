<?php
$price = 120000;

if ($price > 100000) {
    $discount = 0.2 * $price;
    $finalPrice = $price - $discount;
} else {
    $finalPrice = $price;
}

echo "Original price: Rp $price <br>";
echo "Final price after discount: Rp $finalPrice";
?>