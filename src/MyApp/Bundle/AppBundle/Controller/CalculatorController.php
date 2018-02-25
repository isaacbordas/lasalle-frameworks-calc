<?php

namespace MyApp\Bundle\AppBundle\Controller;

use MyApp\Component\Calculator\Calculator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\{Request, Response};
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MyApp\Bundle\AppBundle\Validator\ValidatorCollection;
use MyApp\Bundle\AppBundle\Exception\{DivisionByZeroException, MissingParamException, TypeError};

class CalculatorController extends Controller
{

    public function indexAction()
    {
        return $this->render('calculator/index.html.twig');
    }

    public function addAction(Request $request) : Response
    {
        $param1 = $request->attributes->get('param1');
        $param2 = $request->attributes->get('param2');

        $validator = new ValidatorCollection;
        if(!$validator->existAllParams($param1, $param2)) {
            throw new MissingParamException('Missing parameter', 500);
        }

        if(!$validator->isNumericParamType($param1, $param2)) {
            throw new TypeError('Wrong parameter type', 500);
        }

        $calculator = new Calculator();
        $response = new Response((int)$calculator->add($param1, $param2));

        return $this->render('calculator/index.html.twig', array('result' => $response->getContent()), $response);
    }

    /**
     * @Route("/calculator/subtract/{param1}/{param2}/", name="subtract")
     */
    public function subtractAction(Request $request) : Response
    {
        $param1 = $request->attributes->get('param1');
        $param2 = $request->attributes->get('param2');

        $validator = new ValidatorCollection;
        if(!$validator->existAllParams($param1, $param2)) {
            throw new MissingParamException('Missing parameter', 500);
        }

        if(!$validator->isNumericParamType($param1, $param2)) {
            throw new TypeError('Wrong parameter type', 500);
        }

        $calculator = new Calculator();
        $response = new Response((int)$calculator->subtract($param1, $param2));

        return $this->render('calculator/index.html.twig', array('result' => $response->getContent()), $response);
    }

    public function multiplyAction(Request $request) : Response
    {
        $param1 = $request->attributes->get('param1');
        $param2 = $request->query->get('param2');

        $validator = new ValidatorCollection;
        if(!$validator->existAllParams($param1, $param2)) {
            throw new MissingParamException('Missing parameter', 500);
        }

        if(!$validator->isNumericParamType($param1, $param2)) {
            throw new TypeError('Wrong parameter type', 500);
        }

        $calculator = new Calculator();
        $response = new Response((int)$calculator->multiply($param1, $param2));

        return $this->render('calculator/index.html.twig', array('result' => $response->getContent()), $response);
    }

    public function divideAction(Request $request) : Response
    {
        $param1 = $request->query->get('param1');
        $param2 = $request->query->get('param2');

        $validator = new ValidatorCollection;
        if(!$validator->existAllParams($param1, $param2)) {
            throw new MissingParamException('Missing parameter', 500);
        }

        if(!$validator->isNumericParamType($param1, $param2)) {
            throw new TypeError('Wrong parameter type', 500);
        }

        if($validator->isDivisionByZero($param2)) {
            throw new DivisionByZeroException('Division by zero', 500);
        }

        $calculator = new Calculator();
        $result = $calculator->divide($param1, $param2);
        $response = new Response((float)$result);

        return $this->render('calculator/index.html.twig', array('result' => $response->getContent()), $response);
    }

}