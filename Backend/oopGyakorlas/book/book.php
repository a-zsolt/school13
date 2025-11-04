<?php

class Book {
    private $title;
    private $author;
    private $isbn;
    private $renter;

    public function __construct($title, $author, $isbn)
    {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->renter = null;
    }

    public function getTitle()
    {
        return $this->title;
    }
    
    public function getAuthor()
    {
        return $this->author;
    }
    
    public function getIsbn()
    {
        return $this->isbn;
    }
    
    public function getRenter()
    {
        return $this->renter;
    }
    
    public function rent($member)
    {
        if ($this->renter !== null) {
            echo "\nHiba: A {$this->title} című könyvet már kölcsönözte {$member->getName()}.\n";
            return false;
        }
    
        $this->renter = $member;
        echo "{$this->title} kikölcsönözve {$member->getName()} részére.\n";
        return true;
    }
    
    public function back()
    {
        if ($this->renter === null) {
            echo "Hiba: A {$this->title} című könyvet nem kölcsönözték ki.\n";
            return false;
        }
    
        $this->renter = null;
        echo "{$this->title} visszakerült a könyvtárba.\n";
        return true;
    }

    public function isAvailable()
    {
        return $this->renter === null;
    }

    public function getData(){
        $state = $this->isAvailable() ? "elérhető" : "kölcsönözve {$this->renter->getName()} részére";
        return "BOOK " . $this->author . ":" . $this->title . " - " . $this->isbn . " - " . $state . "\n";
    }
}

