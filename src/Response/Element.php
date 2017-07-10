<?php

namespace Valerian\GoogleDistanceMatrix\Response;

use Valerian\GoogleDistanceMatrix\Exception\Exception;


class Element
{
    const STATUS_OK = 'OK';
    const STATUS_NOT_FOUND = 'NOT_FOUND' ;
    const STATUS_ZERO_RESULTS = 'ZERO_RESULTS';

    const STATUS = [
        self::STATUS_OK,
        self::STATUS_NOT_FOUND,
        self::STATUS_ZERO_RESULTS
    ];

    private $status;

    private $duration;

    private $distance;

    /**
     * Element constructor.
     * @param $status
     * @param Duration $duration
     * @param Distance $distance
     */
    public function __construct($status, Duration $duration, Distance $distance)
    {
        if(!in_array($status,self::STATUS)) {
            throw new Exception('Unknown status code');
        }


        $this->status = $status;
        $this->duration = $duration;
        $this->distance = $distance;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return Duration
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @return Distance
     */
    public function getDistance()
    {
        return $this->distance;
    }
}