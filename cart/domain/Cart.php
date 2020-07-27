<?php


namespace cart\domain;


final class Cart
{
    private int $id;
    private array $products;
    private array $vouchers;

    public function __construct(int $id)
    {
        $this->id = $id;
        $this->products = [];
        $this->vouchers = [];
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product): void
    {
        /*if (!in_array($product, $this->products)){
            array_push($this->products, $product);
        } else {
            $product->increaseAmount(1);
        }*/
        array_push($this->products, $product);
    }

    /**
     * @param Voucher $voucher
     */
    public function addVoucher(Voucher $voucher): void
    {
        if (!in_array($voucher, $this->vouchers)){
            array_push($this->vouchers, $voucher);
        }
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @return array
     */
    public function getVouchers(): array
    {
        return $this->vouchers;
    }
}