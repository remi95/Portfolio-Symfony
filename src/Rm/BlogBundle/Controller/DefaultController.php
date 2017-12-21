<?php

namespace Rm\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RmBlogBundle:Default:index.html.twig');
    }
}
