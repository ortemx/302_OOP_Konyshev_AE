<?php

namespace App;

interface ProductFilteringStrategy
{
    public function filter(Product $product): bool;
}
