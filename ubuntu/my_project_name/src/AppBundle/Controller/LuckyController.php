<?php
/**
 * Created by PhpStorm.
 * User: wse760
 * Date: 2018.04.25.
 * Time: 11:09
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number/{max}")
     */
    public function numberAction($max = 1)
    {
        $number = mt_rand(0, $max);

        return $this->render('lucky/number.html.twig', array(
            'number' => $number
        ));
    }
}