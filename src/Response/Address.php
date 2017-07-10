<?php

namespace Valerian\GoogleDistanceMatrix\Response;

class Address
{
    /**
     * @var string
     */
    private $address;

    /**
     * Address constructor.
     *
     * @param $address string
     */
    public function __construct($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->address;
    }
}
