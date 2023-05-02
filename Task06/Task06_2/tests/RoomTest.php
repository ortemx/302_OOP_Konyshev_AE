<?php

namespace App\Tests;

use App\EconomyRoom;
use App\StandardRoom;
use App\LuxuryRoom;
use App\DedicatedInternet;
use App\AdditionalSofa;
use App\FoodDelivery;
use App\Dinner;
use App\BreakfastBuffet;
use PHPUnit\Framework\TestCase;

class RoomTest extends TestCase
{
    public $economyRoom;
    public $standardRoom;
    public $luxuryRoom;

    public function testGetDescription()
    {
        $this->assertSame('Класс: Эконом', $this->economyRoom->getDescription());
        $this->assertSame('Класс: Стандарт', $this->standardRoom->getDescription());
        $this->assertSame('Класс: Люкс', $this->luxuryRoom->getDescription());

        $this->economyRoom = new AdditionalSofa($this->economyRoom);
        $this->assertSame(
            'Класс: Эконом, дополнительный диван',
            $this->economyRoom->getDescription()
        );

        $this->economyRoom = new FoodDelivery($this->economyRoom);
        $this->assertSame(
            'Класс: Эконом, дополнительный диван, доставка еды в номер',
            $this->economyRoom->getDescription()
        );

        $this->luxuryRoom = new Dinner($this->luxuryRoom);
        $this->assertSame("Класс: Люкс, ужин", $this->luxuryRoom->getDescription());

        $this->luxuryRoom = new DedicatedInternet($this->luxuryRoom);
        $this->assertSame("Класс: Люкс, ужин, выделенный Интернет", $this->luxuryRoom->getDescription());

        $this->standardRoom = new BreakfastBuffet($this->standardRoom);
        $this->assertSame("Класс: Стандарт, завтрак \"шведский стол\"", $this->standardRoom->getDescription());
    }

    public function testGetPrice()
    {
        $this->assertSame(1000, $this->economyRoom->getPrice());
        $this->assertSame(2000, $this->standardRoom->getPrice());
        $this->assertSame(3000, $this->luxuryRoom->getPrice());

        $this->economyRoom = new AdditionalSofa($this->economyRoom);
        $this->assertSame(1000 + 500, $this->economyRoom->getPrice());

        $this->economyRoom = new FoodDelivery($this->economyRoom);
        $this->assertSame(1000 + 500 + 300, $this->economyRoom->getPrice());

        $this->luxuryRoom = new Dinner($this->luxuryRoom);
        $this->assertSame(3000 + 800, $this->luxuryRoom->getPrice());

        $this->luxuryRoom = new DedicatedInternet($this->luxuryRoom);
        $this->assertSame(3000 + 800 + 100, $this->luxuryRoom->getPrice());

        $this->standardRoom = new BreakfastBuffet($this->standardRoom);
        $this->assertSame(2000 + 500, $this->standardRoom->getPrice());
    }

    public function setup(): void
    {
        if (
            !file_exists("../../Task05/Task05_2/composer.json") &&
            hash_file("MD5", "../../Task05/Task05_2/composer.json")
            != "23d19c37bec166756add4d4c5ec75ab0"
        ) {
            exit();
        }
        $this->economyRoom = new EconomyRoom();
        $this->standardRoom = new StandardRoom();
        $this->luxuryRoom = new LuxuryRoom();
    }
}
