<?php
/**
 * Created by PhpStorm.
 * User: ciro
 * Date: 10/07/17
 * Time: 17:19.
 */

namespace Valerian\GoogleDistanceMatrix\Response;

class Row
{
    /**
     * @var array
     */
    private $elements;

    public function __construct($elements)
    {
        $this->elements = $elements;
    }

    /**
     * @return array
     */
    public function getElements()
    {
        return $this->elements;
    }
}
