<?php

namespace App;

class Student
{
    protected static int $lastId = 1;

    private int $id;
    private string $lastname;
    private string $name;
    private string $faculty;
    private int $course;
    private int $group;

    public function __construct()
    {
        $this->id = self::$lastId++;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFaculty(): string
    {
        return $this->faculty;
    }

    public function getCourse(): int
    {
        return $this->course;
    }

    public function getGroup(): int
    {
        return $this->group;
    }

    public function setName(string $name): Student
    {
        $this->name = $name;
        return $this;
    }

    public function setLastname(string $lastname): Student
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function setFaculty(string $faculty): Student
    {
        $this->faculty = $faculty;
        return $this;
    }

    public function setCourse(int $course): Student
    {
        $this->course = $course;
        return $this;
    }

    public function setGroup(int $group): Student
    {
        $this->group = $group;
        return $this;
    }

    public function __toString(): string
    {
        return sprintf(
            "Id: %d\nФамилия: %s\nИмя: %s\nФакультет: %s\nКурс: %d\nГруппа: %d\n",
            $this->id,
            $this->lastname,
            $this->name,
            $this->faculty,
            $this->course,
            $this->group
        );
    }
}
