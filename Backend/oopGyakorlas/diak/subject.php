<?php

class Subject
{
    private $subjectName;
    private $creditPoints;
    private $teacherName;

    public function __construct($subjectName, $creditPoints, $teacherName)
    {
        $this->subjectName = $subjectName;
        $this->creditPoints = $creditPoints;
        $this->teacherName = $teacherName;
    }

    public function getsubjectName()
    {
        return $this->subjectName;
    }

    public function getCreditPoints()
    {
        return $this->creditPoints;
    }

    public function getTeacherName()
    {
        return $this->teacherName;
    }

    public function getData()
    {
        return "Óra neve: {$this->subjectName}, Kreditpontok: {$this->creditPoints}, Oktató neve: {$this->teacherName}";
    }

    public function isItMandatory()
    {
        return $this->creditPoints >= 5;
    }
}