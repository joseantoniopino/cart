<?php


namespace cart\domain;


final class Voucher extends Item
{
    const VOUCHER_V = 0;
    const VOUCHER_R = 1;
    const VOUCHER_S = 2;

    private int $type;

    public function __construct(int $id, string $name, string $description, int $type)
    {
        parent::__construct($id, $name, $description);
        $this->type = $type;
    }

    /**
     * @inheritDoc
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @inheritDoc
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param float $price
     * @return float
     */
    public static function applyVoucherVDiscount(float $price): float
    {
        return ($price * 10 / 100);
    }

    /**
     * @param float $amount
     * @return float
     */
    public static function applyVoucherRDiscount(float $amount): float
    {
        return 5 * $amount;
    }

    /**
     * @param float $subTotal
     * @return float
     */
    public static function applyVoucherSDiscount(float $subTotal): float
    {
        return ($subTotal * 5) / 100;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
