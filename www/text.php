<?php 

include 'Product.php';


#instantiate an object of class product
$prod = new Product();

$type = $prod->getType();
echo $type;

echo "<br/>";

//echo $prod->type;


$prod2 = new Product();

$prod2->setPrice(500);

$price = $prod2->getPrice();

echo $price;


