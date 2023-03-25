<?php

use App\Stack;

function checkIfBalanced(string $expression): bool
{
    $openParenthesises = ["(", "{", "[", "<"];
    $closingParenthesises = [")", "}", "]", ">"];
    $Parenthesises = [
        ")" => "(",
        "}" => "{",
        "]" => "[",
        ">" => "<"
    ];

    $stack = new Stack();

    for ($i = 0; $i < strlen($expression); $i++) {
        if (in_array($expression[$i], $openParenthesises)) {
            $stack->push($expression[$i]);
        } elseif (in_array($expression[$i], $closingParenthesises)) {
            if ($Parenthesises[$expression[$i]] === $stack->top()) {
                $stack->pop();
            } else {
                return false;
            }
        }
    }

    return $stack->isEmpty();
}
