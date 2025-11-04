<?php

class workSheet
{
    private readonly int $id;
    private $car;
    private $description;
    private $cost;
    private $status;

    public function __construct($id, Car $car, $description, $cost, $status = 'open')
    {
        $this->id = $id;
        $this->car = $car;
        $this->description = $description;
        $this->cost = $cost;
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getCar()
    {
        return $this->car;
    }

    public function endWork()
    {
        $this->status = 'closed';
        return "A(z) " . $this->car->carName() . " javítása befejeződött. Munkalap ID: " . $this->id . ", Leírás: " . $this->description . ", Költség: " . $this->cost . " Ft.";
    }

    public function calculateAfa()
    {
        return $this->cost * 1.27;
    }

    public function getInfo()
    {
        return "Munkalap ID: " . $this->id . ", Autó: " . $this->car->carName() . ", Leírás: " . $this->description . ", Költség: " . $this->cost . " Ft, Státusz: " . $this->status;
    }
}