<?php

namespace Rm\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RmMainBundle:Default:index.html.twig');
    }
}
