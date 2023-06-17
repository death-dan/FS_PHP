<?php

namespace Source\Traits;

trait AddressTraits
{
    private $address;

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }
}