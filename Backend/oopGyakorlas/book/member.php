<?php

class Memeber 
{
    private $name;
    private $idNumber;
    private $rentedBooks;

    public function __construct($name, $idNumber)
    {
        $this->name = $name;
        $this->idNumber = $idNumber;
        $this->rentedBooks = 0;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getMemberId()
    {
        return $this->memberId;
    }

    public function getRentedBooksCount()
    {
        return $this->rentedBooks;
    }

    public function rentBook()
    {
        if (!$this->canRent())
        {
            echo "Hiba: {$this->name} nem kölcsönözhet több könyvet.\n";
            return false;
        }

        $this->rentedBooks++;
        return true;
    }

    public function returnBook()
    {
        if ($this->rentedBooks > 0)
        {
            $this->rentedBooks--;
            return true;
        }

        echo "Hiba: {$this->name} nem rendelkezik kölcsönzött könyvekkel.\n";
        return false;
    }

    public function canRent()
    {
        return $this->rentedBooks < 3;
    }

    public function getData(){
        return "TAG " . $this->name . ", ID: " . $this->idNumber . ", Kölcsönzött könyvek száma: " . $this->rentedBooks . "\n";
    }
}