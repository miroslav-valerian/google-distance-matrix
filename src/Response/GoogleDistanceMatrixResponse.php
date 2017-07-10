<?php

namespace Valerian\GoogleDistanceMatrix\Response;

class GoogleDistanceMatrixResponse
{
    const RESPONSE_STATUS_OK = 'OK';
    const RESPONSE_STATUS_INVALID_REQUEST = 'INVALID_REQUEST';
    const RESPONSE_STATUS_MAX_ELEMENTS_EXCEEDED = 'MAX_ELEMENTS_EXCEEDED';
    const RESPONSE_STATUS_OVER_QUERY_LIMIT = 'OVER_QUERY_LIMIT';
    const RESPONSE_STATUS_REQUEST_DENIED = 'REQUEST_DENIED';
    const RESPONSE_STATUS_UNKNOWN_ERROR = 'UNKNOWN_ERROR';

    const RESPONSE_STATUS = [
        self::RESPONSE_STATUS_OK,
        self::RESPONSE_STATUS_INVALID_REQUEST,
        self::RESPONSE_STATUS_MAX_ELEMENTS_EXCEEDED,
        self::RESPONSE_STATUS_OVER_QUERY_LIMIT,
        self::RESPONSE_STATUS_REQUEST_DENIED,
        self::RESPONSE_STATUS_UNKNOWN_ERROR,
    ];

    private $status;

    private $responseObject;

    private $originAddresses;

    private $destinationAddresses;

    private $rows;

    public function __construct(\stdClass $responseObject)
    {
        $this->responseObject = $responseObject;
        $this->originAddresses = array();
        $this->destinationAddresses = array();
        $this->rows = array();
        $this->construct();
    }

    private function addOriginAddress(Address $originAddress)
    {
        $this->originAddresses[] = $originAddress;
    }

    private function addDestinationAddress(Address $destinationAddress)
    {
        $this->destinationAddresses[] = $destinationAddress;
    }

    private function addRow(Row $row)
    {
        $this->rows[] = $row;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return stdClass
     */
    public function getResponseObject()
    {
        return $this->responseObject;
    }

    /**
     * @return array
     */
    public function getOriginAddresses()
    {
        return $this->originAddresses;
    }

    /**
     * @return array
     */
    public function getDestinationAddresses()
    {
        return $this->destinationAddresses;
    }

    /**
     * @return array
     */
    public function getRows()
    {
        return $this->rows;
    }

    private function construct()
    {
        $this->status = $this->responseObject->status;

        foreach ($this->responseObject->origin_addresses as $originAddress) {
            $this->addOriginAddress(new Address($originAddress));
        }

        foreach ($this->responseObject->destination_addresses as $destinationAddress) {
            $this->addDestinationAddress(new Address($destinationAddress));
        }

        foreach ($this->responseObject->rows as $row) {
            $elements = array();
            foreach ($row->elements as $element) {
                $duration = new Duration($element->duration->text, $element->duration->value);
                $distance = new Distance($element->distance->text, $element->distance->value);
                $elements[] = new Element($element->status, $duration, $distance);
            }
            $this->addRow(new Row($elements));
        }
    }
}
