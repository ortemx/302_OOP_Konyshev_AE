<?php

namespace App;

class ManufacturerFilter implements ProductFilteringStrategy
{
    private $manufacturer;

    public function __construct(string $manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    public function filter(Product $product): bool
    {
        return $product->manufacturer === $this->manufacturer;
    }
}
