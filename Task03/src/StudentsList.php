<?php

namespace App;

class StudentsList
{
    private array $students = [];

    public function add(Student $student): void
    {
        $this->students[] = $student;
    }

    public function count(): int
    {
        return count($this->students);
    }

    public function get(int $n): Student
    {
        return $this->students[$n];
    }

    public function store(string $fileName): bool
    {
        return file_put_contents($fileName, serialize($this->students));
    }

    public function load(string $fileName): bool
    {
        if (!file_exists($fileName)) {
            printf("Файл " . $fileName . " не существует!\n");
            return false;
        }

        $this->students = unserialize(file_get_contents($fileName));
        return true;
    }
}
