<?php

use App\Stack;

function runTest()
{
    printf("Проверка работы методов класса Stack\n");

    printf("\tСоздание экземпляра класса: ");
    $stack = new Stack(0, 2, 4, 6, 8, 10);
    $expression = "[10->8->6->4->2->0]";
    printf($stack->__toString() == $expression ? "УСПЕШНО\n" : "НЕУДАЧНО\n");

    printf("\tДобавление элементов (метод push()): ");
    $stack->push(5, 3, 1);
    $expression = "[1->3->5->10->8->6->4->2->0]";
    printf($stack->__toString() == $expression ? "УСПЕШНО\n" : "НЕУДАЧНО\n");

    printf("\tИзвлечение элемента с вершины НЕ пустого стека (метод pop()): ");
    $topelem = 1;
    $expression = "[3->5->10->8->6->4->2->0]";
    if ($topelem == $stack->pop() && $stack->__toString() == $expression) {
        printf("УСПЕШНО\n");
    } else {
        printf("НЕУДАЧНО\n");
    }

    printf("\tИзвлечение элемента с вершины пустого стека: ");
    $emptystack = new Stack();
    printf($emptystack->pop() == null ?  "УСПЕШНО\n" : "НЕУДАЧНО\n");

    printf("\tПросмотр элемента на вершине НЕ пустого стека (метод top()): ");
    $topelem = 3;
    printf($stack->top() == $topelem ? "УСПЕШНО\n" : "НЕУДАЧНО\n");

    printf("\tПросмотр элемента на вершине пустого стека : ");
    $emptystack = new Stack();
    printf($emptystack->top() == null ?  "УСПЕШНО\n" : "НЕУДАЧНО\n");

    printf("\tПроверка стека на пустоту (метод isEmpty()): 1) НЕ пустого - ");
    printf(!$stack->isEmpty() ? "УСПЕШНО\n" : "НЕУДАЧНО\n");

    printf("\tПроверка стека на пустоту: 2) пустого - ");
    printf($emptystack->isEmpty() ? "УСПЕШНО\n" : "НЕУДАЧНО\n");

    printf("\tКопирование стека (метод copy()): ");
    $stackcopy = $stack->copy();
    $equality = $stackcopy->__toString() == $stack->__toString();
    printf($equality ? "УСПЕШНО\n" : "НЕУДАЧНО\n");

    printf(
        "\tСимвольное представление НЕ пустого стека (метод __toString()): %s",
        $stack->__toString()
    );

    $oneElemStack = new stack(1);
    printf(
        "\n\tСимвольное представление стека с одним элементом: %s",
        $oneElemStack->__toString()
    );

    printf(
        "\n\tСимвольное представление пустого стека: %s\n",
        $emptystack->__toString()
    );

    printf("Проверка работы функции checkIfBalanced()\n");

    $expression = "Выражение без скобок";
    printf(
        "\tCтрока \"%s\" %s\n",
        $expression,
        (checkIfBalanced($expression) ? "" : "НЕ ") . "сбаланирована"
    );

    $expression = "{[{}}";
    printf(
        "\tCтрока \"%s\" %s\n",
        $expression,
        (checkIfBalanced($expression) ? "" : "НЕ ") . "сбаланирована"
    );

    $expression = "{[{]}}";
    printf(
        "\tCтрока \"%s\" %s\n",
        $expression,
        (checkIfBalanced($expression) ? "" : "НЕ ") . "сбаланирована"
    );

    $expression = "{[]{}<>(<>)}";
    printf(
        "\tCтрока \"%s\" %s\n",
        $expression,
        (checkIfBalanced($expression) ? "" : "НЕ ") . "сбаланирована"
    );

    $expression = "(ab[cd{}])";
    printf(
        "\tCтрока \"%s\" %s\n",
        $expression,
        (checkIfBalanced($expression) ? "" : "НЕ ") . "сбаланирована"
    );

    $expression = "(ab[cd{})";
    printf(
        "\tCтрока \"%s\" %s\n",
        $expression,
        (checkIfBalanced($expression) ? "" : "НЕ ") . "сбаланирована"
    );

    $expression = "(ab[cd{]})";
    printf(
        "\tCтрока \"%s\" %s\n",
        $expression,
        (checkIfBalanced($expression) ? "" : "НЕ ") . "сбаланирована"
    );
}
