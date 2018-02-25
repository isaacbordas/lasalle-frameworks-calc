<?php

namespace MyApp\Component\Calculator;

class Calculator
{

    public function add(int $v1, int $v2): int
    {
        return $v1 + $v2;
    }

    public function subtract(int $v1, int $v2): int
    {
        return $v1 - $v2;
    }

    public function multiply(int $v1, int $v2): int
    {
        return $v1 * $v2;
    }

    public function divide(int $v1, int $v2) : float
    {
        return ($v1 / $v2);
    }

}