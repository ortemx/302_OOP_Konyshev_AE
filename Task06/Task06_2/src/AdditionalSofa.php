<?php

namespace App;

use App\Room;
use App\AdditionalServices;

class AdditionalSofa extends AdditionalServices
{
    public function getDescription()
    {
        return $this->room->getDescription() . ", дополнительный диван";
    }

    public function getPrice()
    {
        return $this->room->getPrice() + 500;
    }
}
