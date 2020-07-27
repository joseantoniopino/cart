<?php
include dirname(__FILE__).'/domain/Product.php';

use cart\domain\Product;

$product_a = new Product(1, 'Product A', 'This is the product a', 10.00);
$product_b = new Product(2, 'Product B', 'This is the product b', 8.00);
$product_c = new Product(3, 'Product C', 'This is the product c', 12.00);
