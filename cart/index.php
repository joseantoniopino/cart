<?php

include 'domain/Cart.php';
include 'domain/Order.php';
include 'ProductFactory.php';
include 'VoucherFactory.php';


use cart\domain\Cart;
use cart\domain\Order;

// Example 1
$cart = new Cart(1);
$cart->addProduct($product_a);
$cart->addProduct($product_c);
$cart->addProduct($product_a);
$cart->addProduct($product_b);

$cart->addVoucher($voucher_s);
$cart->addVoucher($voucher_v);

$order = new Order(1, $cart);
echo "Example 1 subtotal: ". $order->getSubtotal() . "€ <br>";


//Example 2
$cart2 = new Cart(2);
$cart2->addProduct($product_a);
$cart2->addProduct($product_a);
$cart2->addProduct($product_b);
$cart2->addProduct($product_c);
$cart2->addProduct($product_c);
$cart2->addProduct($product_c);

$cart2->addVoucher($voucher_s);
$cart2->addVoucher($voucher_v);
$cart2->addVoucher($voucher_r);

$order2 = new Order(2, $cart2);
echo "Example 2 subtotal: ". $order2->getSubtotal() . "€";
