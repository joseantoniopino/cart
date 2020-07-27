<?php
include dirname(__FILE__).'/domain/Voucher.php';

use cart\domain\Voucher;

$voucher_v = new Voucher(1, 'Voucher V', 'This is the voucher v', 0);
$voucher_r = new Voucher(2, 'Voucher R', 'This is the voucher r', 1);
$voucher_s = new Voucher(3, 'Voucher S', 'This is the voucher s', 2);