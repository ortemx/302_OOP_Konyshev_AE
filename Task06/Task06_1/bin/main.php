#!/usr/bin/env php
<?php

namespace App;

$autoloadPath = __DIR__ . '/../vendor/autoload.php';

if (file_exists($autoloadPath)) {
    require_once($autoloadPath);
}

$p1 = new Product;
$p1->name = 'Шоколад';
$p1->listPrice = 100;
$p1->sellingPrice = 50;
$p1->manufacturer = 'Красный Октябрь';

$p2 = new Product;
$p2->name = 'Мармелад';
$p2->listPrice = 100;
$p2->manufacturer = 'Ламзурь';

$collection = new ProductCollection([$p1, $p2]);

$resultCollection = $collection->filter(new ManufacturerFilter('Ламзурь'));
print_r($resultCollection->getProductsArray());  // $p2

$resultCollection = $collection->filter(new MaxPriceFilter(50));
print_r($resultCollection->getProductsArray());  // $p1
