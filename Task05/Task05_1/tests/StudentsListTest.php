<?php

namespace App\Tests;

use App\Student;
use App\StudentsList;
use PHPUnit\Framework\TestCase;

class StudentsListTest extends TestCase
{
    private static $student1;
    private static $student2;
    private static $student3;

    public static function setUpBeforeClass(): void
    {
        self::$student1 = new Student();
        self::$student1->setLastname('Konyshev')->setName('Ivan')->setFaculty('IT')->setCourse(2)->setGroup(302);
        self::$student2 = new Student();
        self::$student2->setLastname('Paramonov')->setName('Egor')->setFaculty('EF')->setCourse(2)->setGroup(302);
        self::$student3 = new Student();
        self::$student3->setLastname('Vadyanov')->setName('Petr')->setFaculty('IT')->setCourse(2)->setGroup(304);
    }
    public function testCurrent(): void
    {
        $studentsList = new StudentsList();
        $studentsList->add(self::$student1);
        $studentsList->add(self::$student2);
        $this->assertSame(self::$student1, $studentsList->current());
    }

    public function testNext(): void
    {
        $studentsList = new StudentsList();
        $studentsList->add(self::$student1);
        $studentsList->add(self::$student2);
        $studentsList->add(self::$student3);
        $this->assertSame(self::$student1, $studentsList->current());
        $studentsList->next();
        $this->assertSame(self::$student2, $studentsList->current());
        $studentsList->next();
        $this->assertSame(self::$student3, $studentsList->current());
    }

    public function testValid(): void
    {
        $studentsList = new StudentsList();
        $studentsList->add(self::$student1);
        $studentsList->add(self::$student2);
        $studentsList->add(self::$student3);
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
        $studentsList->add(self::$student1);
        $studentsList->add(self::$student2);
        $studentsList->add(self::$student3);
        $studentsList->next();
        $studentsList->next();
        $studentsList->next();
        $this->assertFalse($studentsList->current());
        $studentsList->rewind();
        $this->assertSame(self::$student1, $studentsList->current());
    }

    public function testKey(): void
    {
        $studentsList = new StudentsList();
        $studentsList->add(self::$student1);
        $studentsList->add(self::$student2);
        $studentsList->add(self::$student3);
        $this->assertSame(self::$student1->getId(), $studentsList->key());
        $studentsList->next();
        $this->assertSame(self::$student2->getId(), $studentsList->key());
        $studentsList->next();
        $this->assertSame(self::$student3->getId(), $studentsList->key());
    }
}
