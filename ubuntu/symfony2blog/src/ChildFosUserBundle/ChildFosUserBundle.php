<?php

namespace ChildFosUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ChildFosUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
