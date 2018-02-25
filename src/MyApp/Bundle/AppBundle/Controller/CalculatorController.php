<?php

namespace MyApp\Bundle\AppBundle\Controller;

use MyApp\Component\Calculator\Calculator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\{Request, Response};
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CalculatorController extends Controller
{

    public function indexAction()
    {
        return $this->render('calculator/index.html.twig');
    }

    public function addAction($param1, $param2) : Response
    {
        $calculator = new Calculator();
        $response = new Response((int)$calculator->add((int)$param1, (int)$param2));

        return $this->render('calculator/index.html.twig', array('result' => $response->getContent()), $response);
    }

    /**
     * @Route("/calculator/subtract/{param1}/{param2}/", name="subtract")
     */
    public function subtractAction($param1, $param2) : Response
    {
        $calculator = new Calculator();
        $response = new Response((int)$calculator->subtract($param1, $param2));

        return $this->render('calculator/index.html.twig', array('result' => $response->getContent()), $response);
    }

    public function multiplyAction($param1, Request $request) : Response
    {
        $param2 = $request->query->get('param2');
        $calculator = new Calculator();
        $response = new Response((int)$calculator->multiply((int) $param1, (int)$param2));

        return $this->render('calculator/index.html.twig', array('result' => $response->getContent()), $response);
    }

    public function divideAction(Request $request) : Response
    {
        $param1 = $request->query->get('param1');
        $param2 = $request->query->get('param2');

        $calculator = new Calculator();
        $result = $calculator->divide((float)$param1, (float)$param2);
        $response = new Response((float)$result);

        return $this->render('calculator/index.html.twig', array('result' => $response->getContent()), $response);
    }

}