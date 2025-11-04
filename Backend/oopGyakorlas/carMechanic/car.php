<?php

class Car
{
    private $plate;
    private $brand;
    private $model;
    private $mileage;

    public function __construct($plate, $brand, $model, $mileage)
    {
        $this->plate = $plate;
        $this->brand = $brand;
        $this->model = $model;
        $this->mileage = $mileage;
    }

    public function getPlate()
    {
        return $this->plate;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getMileage()
    {
        return $this->mileage;
    }

    public function carName()
    {
        return $this->brand . ' ' . $this->model;
    }

    public function addMileage($distance)
    {
        if ($distance > 0) {
            $this->mileage += $distance;
        }
    }

    public function getCarData()
    {
        return "Rendszám: " . $this->plate . ", Márka: " . $this->brand . ", Modell: " . $this->model . ", Futott km: " . $this->mileage . " km";
    }
}