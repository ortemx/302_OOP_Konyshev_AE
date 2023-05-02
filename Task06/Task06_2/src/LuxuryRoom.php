<?php

namespace App;

class LuxuryRoom extends Room
{
    public function getDescription()
    {
        return "Класс: Люкс";
    }

    public function getPrice()
    {
        return 3000;
    }
}
