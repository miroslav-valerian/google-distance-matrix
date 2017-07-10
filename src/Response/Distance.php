<?php

namespace Valerian\GoogleDistanceMatrix\Response;

class Distance
{
    private $text;

    private $value;

    /**
     * Distance constructor.
     *
     * @param $text
     * @param $value
     */
    public function __construct($text, $value)
    {
        $this->text = $text;
        $this->value = $value;
    }

    public function __toString()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
