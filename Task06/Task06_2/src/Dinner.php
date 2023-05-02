<?php

namespace App;

use App\HotelRoom;
use App\AdditionalServices;

class Dinner extends AdditionalServices
{
    public function getDescription()
    {
        return $this->room->getDescription() . ", ужин";
    }

    public function getPrice()
    {
        return $this->room->getPrice() + 800;
    }
}
