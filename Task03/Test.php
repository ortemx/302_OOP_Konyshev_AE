<?php

use App\Student;
use App\StudentsList;

function runTest()
{
    /*
     * Проверка работы методов класса Student
    */

    // Проверка методов set
    $student1 = new Student();
    $student1->setName("Егор")->setLastname("Белов")->setFaculty("ФМиИТ")->setCourse(2)->setGroup(302);

    $student2 = new Student();
    $student2->setName("Павел")->setLastname("Гулин")->setFaculty("ФМиИТ")->setCourse(2)->setGroup(302);

    $student3 = new Student();
    $student3->setName("Марк")->setLastname("Хрущалин")->setFaculty("ФМиИТ")->setCourse(2)->setGroup(302);

    // Проверка автоинкременции поля id
    $ids = $student1->getId() . " " . $student2->getId() . " " . $student3->getId();
    $expected = "1 2 3";
    if ($ids == $expected) {
        printf("Проверка автоинкременции поля id прошла УСПЕШНО\n");
    } else {
        printf("Проверка автоинкременции поля id прошла НЕУДАЧНО\n");
    }

    // Проверка всех методов get
    $info = sprintf(
        "Id: %d\nФамилия: %s\nИмя: %s\nФакультет: %s\nКурс: %d\nГруппа: %d\n",
        $student1->getId(),
        $student1->getLastname(),
        $student1->getName(),
        $student1->getFaculty(),
        $student1->getCourse(),
        $student1->getGroup()
    );

    $expected = $student1->__toString();
    if ($info == $expected) {
        printf("Проверка всех методов get прошла УСПЕШНО\n");
    } else {
        printf("Проверка всех методов get прошла НЕУДАЧНО\n");
    }

    // Проверка работы метода __toString()
    printf("\tИнформация о студенте (метод __toString()):\n%s", $student3->__toString());

    /*
     * Проверка работы методов класса StudentsList
    */

    $studentsList = new StudentsList();

    // Проверка метода add()
    $studentsList->add($student1);
    $studentsList->add($student2);
    $studentsList->add($student3);

    // Проверка метода count()
    $studentNumber = $studentsList->count();
    $expected = 3;
    if ($studentNumber == $expected) {
        printf("Проверка метода count() прошла УСПЕШНО\n");
    } else {
        printf("Проверка метода count() прошла НЕУДАЧНО\n");
    }

    // Проверка метода get
    if (
        $student1 == $studentsList->get(0)
        && $student2 == $studentsList->get(1)
        && $student3 == $studentsList->get(2)
    ) {
        printf("Проверка метода get() прошла УСПЕШНО\n");
    } else {
        printf("Проверка метода get() прошла НЕУДАЧНО\n");
    }

    // Проверка метода store()

    $fileName = "students.txt";
    if ($studentsList->store($fileName)) {
        printf("Проверка метода store() прошла УСПЕШНО\n");
    } else {
        printf("Проверка метода store() прошла НЕУДАЧНО\n");
    }

    // Проверка метода load()
    $studentsList = new StudentsList();
    if ($studentsList->load($fileName) && $studentsList->count() == 3) {
        printf("Проверка метода load() прошла УСПЕШНО\n");
    } else {
        printf("Проверка метода load() прошла НЕУДАЧНО\n");
    }
}
