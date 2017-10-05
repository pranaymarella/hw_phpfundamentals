<?php

namespace DWA;

class Bill
{
    // properties
    private $tip;
    private $base_total;
    private $people;
    private $service;

    // Methods
    public function __construct($tip, $base_total, $people, $service)
    {
        $this->tip = $tip;
        $this->base_total = $base_total;
        $this->people = $people;
        $this->service = $service;
    }

    // Gets the Bill total, after tax and tip
    public function getTotal() {
        return ($this->base_total + ($this->tip * $this->base_total)) / $this->people;
    }
}
