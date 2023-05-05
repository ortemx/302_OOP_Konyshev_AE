<?php

namespace App\Tests;

use App\maxPriceFilter;
use App\Product;
use App\ProductCollection;
use PHPUnit\Framework\TestCase;

class MaxPriceFilterTest extends TestCase
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
        $product2->sellingPrice = 125;

        $product3 = new Product();
        $product3->name = 'Product3';
        $product3->manufacturer = 'Manufacturer1';
        $product3->listPrice = 120;

        $product4 = new Product();
        $product4->name = 'Product2';
        $product4->manufacturer = 'Manufacturer2';
        $product4->listPrice = 250;

        $product5 = new Product();
        $product5->name = 'Product4';
        $product5->manufacturer = 'Manufacturer2';
        $product5->listPrice = 130;
        $product2->sellingPrice = 100;

        self::$productCollection = new ProductCollection([$product1, $product2, $product3, $product4,  $product5]);
    }

    public function testFilter()
    {
        $maxPrice = 150;
        $maxPriceFilter = new maxPriceFilter($maxPrice);
        $products = [];

        foreach (self::$productCollection->getProductsArray() as $product) {
            if ($product->sellingPrice ?? $product->listPrice <= $maxPrice) {
                $products[] = $product;
            }
        }

        $resultCollection = new ProductCollection($products);
        $this->assertEquals($resultCollection, self::$productCollection->filter($maxPriceFilter));

        $maxPrice = 200;
        $maxPriceFilter = new maxPriceFilter($maxPrice);
        $products = [];

        foreach (self::$productCollection->getProductsArray() as $product) {
            if ($product->sellingPrice ?? $product->listPrice <= $maxPrice) {
                $products[] = $product;
            }
        }

        $resultCollection = new ProductCollection($products);
        $this->assertEquals($resultCollection, self::$productCollection->filter($maxPriceFilter));
    }
}
