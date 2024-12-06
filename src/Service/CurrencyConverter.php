<?php

// src/Service/CurrencyConverter.php
namespace App\Service;

class CurrencyConverter
{
    private $exchangeRate;

    public function __construct(float $exchangeRate)
    {
        $this->exchangeRate = $exchangeRate;
    }

    public function convertToEuro(float $price): float
    {
        return $price * $this->exchangeRate;
    }
}
