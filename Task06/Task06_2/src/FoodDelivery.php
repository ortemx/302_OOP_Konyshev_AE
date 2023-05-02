<?php

namespace App;

class FoodDelivery extends AdditionalServices
{
    public function getDescription()
    {
        return $this->room->getDescription() . ", доставка еды в номер";
    }

    public function getPrice()
    {
        return $this->room->getPrice() + 300;
    }
}
