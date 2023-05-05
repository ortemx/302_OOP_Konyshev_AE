<?php

namespace App;

class EconomyRoom extends Room
{
    public function getDescription()
    {
        return "Класс: Эконом";
    }

    public function getPrice()
    {
        return 1000;
    }
}
