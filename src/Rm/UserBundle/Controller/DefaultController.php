<?php

namespace Rm\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RmUserBundle:Default:index.html.twig');
    }
}
