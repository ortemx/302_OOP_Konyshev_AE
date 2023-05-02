<?php

namespace App;

abstract class AdditionalServices extends Room
{
    protected Room $room;

    public function __construct(Room $room)
    {
        $this ->room = $room;
    }

    abstract public function getDescription();
    abstract public function getPrice();
}
