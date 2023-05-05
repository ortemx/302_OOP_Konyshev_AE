<?php

namespace App;

use App\HotelRoom;
use App\AdditionalServices;

class BreakfastBuffet extends AdditionalServices
{
    public function getDescription()
    {
        return $this->room->getDescription() . ", завтрак \"шведский стол\"";
    }

    public function getPrice()
    {
        return $this->room->getPrice() + 500;
    }
}
