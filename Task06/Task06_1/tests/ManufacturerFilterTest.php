<?php

namespace App\Tests;

use App\ManufacturerFilter;
use App\Product;
use App\ProductCollection;
use PHPUnit\Framework\TestCase;

class ManufacturerFilterTest extends TestCase
{
    public static $productCollection;

    public static function setUpBeforeClass(): void
    {
        $product1 = new Product();
        $product1->name = 'Product1';
        $product1->manufacturer = 'Manufacturer1';
        $product1->listPrice = 100;

        $product2 = new Product();
        $product2->name = 'Product2';
        $product2->manufacturer = 'Manufacturer1';
        $product2->listPrice = 200;

        $product3 = new Product();
        $product3->name = 'Product3';
        $product3->manufacturer = 'Manufacturer2';
        $product3->listPrice = 300;

        $product4 = new Product();
        $product4->name = 'Product2';
        $product4->manufacturer = 'Manufacturer2';
        $product4->listPrice = 2500;

        self::$productCollection = new ProductCollection([$product1, $product2, $product3, $product4]);
    }

    public function testFilter()
    {
        $firstManufacturer = 'Manufacturer1';
        $manufacturerFilter = new ManufacturerFilter($firstManufacturer);
        $products = [];

        foreach (self::$productCollection->getProductsArray() as $product) {
            if ($product->manufacturer == $firstManufacturer) {
                $products[] = $product;
            }
        }

        $resultCollection = new ProductCollection($products);
        $this->assertEquals($resultCollection, self::$productCollection->filter($manufacturerFilter));

        $secondManufacturer = 'Manufacturer2';
        $manufacturerFilter = new ManufacturerFilter($secondManufacturer);
        $products = [];

        foreach (self::$productCollection->getProductsArray() as $product) {
            if ($product->manufacturer == $secondManufacturer) {
                $products[] = $product;
            }
        }

        $resultCollection = new ProductCollection($products);
        $this->assertEquals($resultCollection, self::$productCollection->filter($manufacturerFilter));
    }
}
