<?php

class Product 
{
    private $productName;
    private $price;
    private $quantity;
    private $barCode;

    public function __construct($productName, $price, $quantity, $barCode) 
    {
        $this->productName = $productName;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->barCode = $barCode;
    }

    public function getProductName() 
    {
        return $this->productName;
    }

    public function getPrice() 
    {
        return $this->price;
    }

    public function getQuantity() 
    {
        return $this->quantity;
    }

    public function getBarCode() 
    {
        return $this->barCode;
    }

    public function getData() 
    {
        return "\nTermék neve: {$this->productName}, Ár: {$this->price}, Mennyiség: {$this->quantity}, Vonalkód: {$this->barCode}";
    }

    public function addStock($amount) 
    {
        $this->quantity += $amount;
    }

    public function removeStock($amount) 
    {
        if ($amount <= $this->quantity) {
            $this->quantity -= $amount;
        } else {
            echo "\nNincs elég készlet a művelet végrehajtásához.\n";
        }
    }

    public function isInStock() 
    {
        return $this->quantity > 0;
    }

    public function calculateTotalValue() 
    {
        return $this->price * $this->quantity;
    }
}