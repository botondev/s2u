<?php
/**
 * Created by PhpStorm.
 * User: botondev
 * Date: 2018.06.23.
 * Time: 17:34
 */

namespace Blog\CoreBundle\Twig;

use Symfony\Component\DependencyInjection\Container;

class CoreExtension extends \Twig_Extension
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('decorator', array($this, 'decoratorFilter')),
        );
    }

    public function decoratorFilter($title)
    {
        $useStar = $this->container->getParameter('twig_decorator.use_star');
        $symbol = $useStar ? "*" : "!";
        return $symbol . $title . $symbol;
    }

    public function getName()
    {
        return 'CoreExtension';
    }

}