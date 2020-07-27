<?php
namespace cart\domain;

abstract class Item
{
    protected int $id;
    protected string $name;
    protected string $description;

    protected function __construct(int $id, string $name, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @return int
     */
    abstract public function getId(): int ;

    /**
     * @param int $id
     */
    abstract public function setId(int $id): void;

    /**
     * @return string
     */
    abstract public function getName(): string ;

    /**
     * @param string $name
     */
    abstract public function setName(string $name): void;

    /**
     * @return string
     */
    abstract public function getDescription(): string ;

    /**
     * @param string $description
     */
    abstract public function setDescription(string $description): void;
}