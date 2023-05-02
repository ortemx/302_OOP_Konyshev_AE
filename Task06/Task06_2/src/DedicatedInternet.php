<?php

namespace App;

class DedicatedInternet extends AdditionalServices
{
    public function getDescription()
    {
        return $this->room->getDescription() . ", выделенный Интернет";
    }

    public function getPrice()
    {
        return $this->room->getPrice() + 100;
    }
}
