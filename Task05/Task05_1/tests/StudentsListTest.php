<?php

namespace App\Tests;

use App\Student;
use App\StudentsList;
use PHPUnit\Framework\TestCase;

class StudentsListTest extends TestCase
{
    private $student1;
    private $student2;
    private $student3;

    public function setUp(): void
    {
        $this->student1 = new Student();
        $this->student1->setLastname('Konyshev')->setName('Ivan')->setFaculty('IT')->setCourse(2)->setGroup(302);
        $this->student2 = new Student();
        $this->student2->setLastname('Paramonov')->setName('Egor')->setFaculty('EF')->setCourse(2)->setGroup(302);
        $this->student3 = new Student();
        $this->student3->setLastname('Vadyanov')->setName('Petr')->setFaculty('IT')->setCourse(2)->setGroup(304);
    }
    public function testCurrent(): void
    {
        $studentsList = new StudentsList();
        $studentsList->add($this->student1);
        $studentsList->add($this->student2);
        $this->assertSame($this->student1, $studentsList->current());

        foreach($studentsList as $student) {
            printf("id = %d\n", $student->getId());
        }

        printf("count = %d\n", $studentsList->count());
    }

    public function testNext(): void
    {
        $studentsList = new StudentsList();
        $studentsList->add($this->student1);
        $studentsList->add($this->student2);
        $studentsList->add($this->student3);
        $this->assertSame($this->student1, $studentsList->current());
        $studentsList->next();
        $this->assertSame($this->student2, $studentsList->current());
        $studentsList->next();
        $this->assertSame($this->student3, $studentsList->current());

        foreach($studentsList as $student) {
            printf("id = %d\n", $student->getId());
        }

        printf("count = %d\n", $studentsList->count());
    }

    public function testValid(): void
    {
        $studentsList = new StudentsList();
        $studentsList->add($this->student1);
        $studentsList->add($this->student2);
        $studentsList->add($this->student3);
        $studentsList->next();
        $this->assertTrue($studentsList->valid());
        $studentsList->next();
        $this->assertTrue($studentsList->valid());
        $studentsList->next();
        $this->assertFalse($studentsList->valid());
    }

    public function testRewind(): void
    {
        $studentsList = new StudentsList();
        $studentsList->add($this->student1);
        $studentsList->add($this->student2);
        $studentsList->add($this->student3);
        $studentsList->next();
        $studentsList->next();
        $studentsList->next();
        $this->assertFalse($studentsList->current());
        $studentsList->rewind();
        $this->assertSame($this->student1, $studentsList->current());
    }

    public function testKey(): void
    {
        $studentsList = new StudentsList();
        $studentsList->add($this->student1);
        $studentsList->add($this->student2);
        $studentsList->add($this->student3);
        $this->assertSame($this->student1->getId(), $studentsList->key());
        $studentsList->next();
        $this->assertSame($this->student2->getId(), $studentsList->key());
        $studentsList->next();
        $this->assertSame($this->student3->getId(), $studentsList->key());
    }
}
