<?php


namespace cart\domain;


final class Order
{
    private int $id;
    private Cart $cart;
    private float $subtotal;
    private bool $voucher_v;
    private bool $voucher_r;
    private bool $voucher_s;
    private array $productsId;
    private int $productAmountA;
    private int $productAmountB;

    public function __construct(int $id, Cart $cart)
    {
        $this->id = $id;
        $this->cart = $cart;
        $this->subtotal = 0.00;
        $this->voucher_v = false;
        $this->voucher_r = false;
        $this->voucher_s = false;
        $this->productsId = [];
        $this->productAmountA = 0;
        $this->productAmountB = 0;
    }

    /**
     * @return float
     */
    public function getSubtotal(): float
    {
        $products = $this->cart->getProducts();
        $vouchers = $this->cart->getVouchers();
        $this->getDiscounts($vouchers);

        /** @var Product $product */
        foreach ($products as $product) {
            $this->subtotal += $product->getPrice();
            $this->getProductsAmount($product);
        }

        if ($this->voucher_v && $this->productAmountA >= 2)
            $this->subtotal -= Voucher::applyVoucherVDiscount(10);

        if ($this->voucher_r)
            $this->subtotal -= Voucher::applyVoucherRDiscount($this->productAmountB);

        if ($this->voucher_s && $this->subtotal > 40.00)
            $this->subtotal -= Voucher::applyVoucherSDiscount($this->subtotal);

        return $this->subtotal;
    }

    /**
     * @param Product $product
     */
    private function getProductsAmount(Product $product): void
    {
        switch ($product->getId()){
            case 1:
                $this->productAmountA++;
                break;
            case 2:
                $this->productAmountB++;
                break;
        }
    }

    /**
     * @param array $vouchers
     */
    private function getDiscounts(array $vouchers): void
    {
        /** @var Voucher $voucher */
        foreach ($vouchers as $voucher) {
            switch ($voucher->getType()) {
                case Voucher::VOUCHER_V:
                    $this->voucher_v = true;
                    break;
                case Voucher::VOUCHER_R:
                    $this->voucher_r = true;
                    break;
                case Voucher::VOUCHER_S:
                    $this->voucher_s = true;
                    break;
            }
        }
    }
}