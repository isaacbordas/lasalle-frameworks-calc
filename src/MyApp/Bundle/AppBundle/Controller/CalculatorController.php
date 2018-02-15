<?php

namespace MyApp\Bundle\AppBundle\Controller;

use MyApp\Component\Calculator\Calculator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CalculatorController
{

    public function addAction($param1, $param2)
    {
        $calculator = new Calculator();
        return new Response((int)$calculator->add($param1, (int)$param2));
    }

    /**
     * @Route("/subtract/{param1}/{param2}/", name="subtract", requirements={"param1": "\d+", "param2": "\d+"})
     */
    public function subtractAction($param1, $param2)
    {
        $calculator = new Calculator();
        return new Response((int)$calculator->subtract($param1, (int)$param2));
    }

    public function multiplyAction($param1, Request $request)
    {
        $param2 = $request->query->get('param2');
        $calculator = new Calculator();
        return new Response((int)$calculator->multiply($param1, (int)$param2));
    }

    public function divideAction(Request $request)
    {
        $param1 = $request->query->get('param1');
        $param2 = $request->query->get('param2');

        $calculator = new Calculator();
        $result = $calculator->divide((float)$param1, (float)$param2);
        return new Response((float)$result);
    }

}