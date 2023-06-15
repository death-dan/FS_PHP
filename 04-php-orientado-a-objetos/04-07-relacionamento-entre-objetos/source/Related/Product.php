<?php

namespace Source\Related;

class Product
{
    private $name;
    private $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
    */
    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return number_format($this->price, "2", ".", ",");
    }

    /**
     * @param mixed $price
    */
    public function setPrice($price): void
    {
        $this->price = $price;
    }
}