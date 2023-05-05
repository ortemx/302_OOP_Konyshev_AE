<?php

namespace App;

class StandardRoom extends Room
{
    public function getDescription()
    {
        return "Класс: Стандарт";
    }

    public function getPrice()
    {
        return 2000;
    }
}
