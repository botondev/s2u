<?php

namespace ExampleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExampleController extends Controller
{
    public function testAction()
    {
        return $this->render('ExampleBundle:Example:test.html.twig');
    }
}
