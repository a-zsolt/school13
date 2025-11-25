<?php

class Student
{
    public $id;
    public $name;
    public $className;
    public $grade;

    public function __toString(): string {
        return $this->name. '(' . $this->className. ') - ' . $this->grade;
    }
}