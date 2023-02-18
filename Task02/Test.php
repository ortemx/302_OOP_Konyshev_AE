<?php

function runTest()
{
    //String representation test
    $fraction1 = new Fraction(4, 8);
    $correct = "1/2";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: $fraction1" . PHP_EOL;
    if ($fraction1 == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    $fraction2 = new Fraction(10, 8);
    $correct = "1'1/4";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: $fraction2" . PHP_EOL;
    if ($fraction2 == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    $fraction3 = new Fraction(-45, 9);
    $correct = "-5'";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: $fraction3" . PHP_EOL;
    if ($fraction3 == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }


    //Adding test
    $fraction1 = new Fraction(1, 2);
    $fraction2 = new Fraction(4, 6);
    $fraction3 = $fraction1->add($fraction2);
    $correct = "1'1/6";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: " . $fraction3 . PHP_EOL;
    if ($fraction3 == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    $fraction1 = new Fraction(1, 2);
    $fraction2 = new Fraction(-4, 6);
    $fraction3 = $fraction1->add($fraction2);
    $correct = "-1/6";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: " . $fraction3 . PHP_EOL;
    if ($fraction3 == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    $fraction1 = new Fraction(9, 3);
    $fraction2 = new Fraction(-4, 6);
    $fraction3 = $fraction1->add($fraction2);
    $correct = "2'1/3";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: " . $fraction3 . PHP_EOL;
    if ($fraction3 == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }


    // Subtraction test
    $fraction1 = new Fraction(9, 3);
    $fraction2 = new Fraction(4, 6);
    $fraction3 = $fraction1->sub($fraction2);
    $correct = "2'1/3";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: " . $fraction3 . PHP_EOL;
    if ($fraction3 == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    $fraction1 = new Fraction(-7, 5);
    $fraction2 = new Fraction(3, 4);
    $fraction3 = $fraction1->sub($fraction2);
    $correct = "-2'3/20";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: " . $fraction3 . PHP_EOL;
    if ($fraction3 == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }


    // Division test
    $fraction1 = new Fraction(-7, 5);
    $fraction2 = new Fraction(3, 4);
    $fraction3 = $fraction1->div($fraction2);
    $correct = "-1'13/15";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: " . $fraction3 . PHP_EOL;
    if ($fraction3 == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    $fraction1 = new Fraction(-4, 8);
    $fraction2 = new Fraction(8, 4);
    $fraction3 = $fraction1->div($fraction2);
    $correct = "-1/4";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: " . $fraction3 . PHP_EOL;
    if ($fraction3 == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    $fraction1 = new Fraction(-4, 8);
    $fraction2 = new Fraction(4, 8);
    $fraction3 = $fraction1->div($fraction2);
    $correct = "-1'";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: " . $fraction3 . PHP_EOL;
    if ($fraction3 == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }


    // Multiplication test
    $fraction1 = new Fraction(-4, 8);
    $fraction2 = new Fraction(4, 8);
    $fraction3 = $fraction1->mult($fraction2);
    $correct = "-1/4";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: " . $fraction3 . PHP_EOL;
    if ($fraction3 == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    $fraction1 = new Fraction(-9, 3);
    $fraction2 = new Fraction(12, 60);
    $fraction3 = $fraction1->mult($fraction2);
    $correct = "-3/5";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: " . $fraction3 . PHP_EOL;
    if ($fraction3 == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }


    // Exponentiation test
    $fraction1 = new Fraction(-2, 3);
    $exp = 5;
    $fraction2 = $fraction1->pow($exp);
    $correct = "-32/243";
    echo "Ожидается: $correct" . PHP_EOL;
    echo "Получено: " . $fraction2 . PHP_EOL;
    if ($fraction2 == $correct) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }
}
