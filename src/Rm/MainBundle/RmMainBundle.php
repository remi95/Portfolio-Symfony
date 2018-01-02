<?php

namespace Rm\MainBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class RmMainBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
