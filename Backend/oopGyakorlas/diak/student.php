<?php

class Student
{
    private $name;
    private $neptunID;
    private $dateOfBirth;

    public function __construct($name, $neptunID, $dateOfBirth)
    {
        $this->name = $name;
        $this->neptunID = $neptunID;
        $this->dateOfBirth = $dateOfBirth;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getneptunID()
    {
        return $this->neptunID;
    }

    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    public function getData()
    {
        return "Név: {$this->name}, Diákazonosító: {$this->neptunID}, Születési dátum: {$this->dateOfBirth}";
    }
}