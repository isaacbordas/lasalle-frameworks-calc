<?php

namespace MyApp\Component\Calculator;

use MyApp\Component\Validator\ValidatorCollection;
use MyApp\Component\Exception\{DivisionByZeroException, MissingParamException, TypeError};
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Calculator extends Controller
{

    public function add($v1, $v2): int
    {
        $validator = new ValidatorCollection;
        if(!$validator->existAllParams($v1, $v2)) {
            throw new MissingParamException('Missing parameter', 500);
        }

        if(!$validator->isNumericParamType($v1, $v2)) {
            throw new TypeError('Wrong parameter type', 500);
        }

        return $v1 + $v2;
    }

    public function subtract(int $v1, int $v2): int
    {
        $validator = new ValidatorCollection;
        if(!$validator->existAllParams($v1, $v2)) {
            throw new MissingParamException('Missing parameter', 500);
        }

        if(!$validator->isNumericParamType($v1, $v2)) {
            throw new TypeError('Wrong parameter type', 500);
        }

        return $v1 - $v2;
    }

    public function multiply(int $v1, int $v2): int
    {
        $validator = new ValidatorCollection;
        if(!$validator->existAllParams($v1, $v2)) {
            throw new MissingParamException('Missing parameter', 500);
        }

        if(!$validator->isNumericParamType($v1, $v2)) {
            throw new TypeError('Wrong parameter type', 500);
        }

        return $v1 * $v2;
    }

    public function divide(float $v1, float $v2)
    {
        $validator = new ValidatorCollection;
        if(!$validator->existAllParams($v1, $v2)) {
            throw new MissingParamException('Missing parameter', 500);
        }

        if(!$validator->isNumericParamType($v1, $v2)) {
            throw new TypeError('Wrong parameter type', 500);
        }

        if($validator->isDivisionByZero($v2)) {
            throw new DivisionByZeroException('Division by zero', 500);
        }

        $result = ($v1 / $v2);
        return (float) $result;
    }

}