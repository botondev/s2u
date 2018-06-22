<?php
/**
 * Created by PhpStorm.
 * User: botondev
 * Date: 2018.06.22.
 * Time: 2:17
 */

namespace Blog\CoreBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller
{
    /**
     * @Route("/")
     * @Template
     *
     * @return array
     */
    public function indexAction()
    {
        return array();
    }
}