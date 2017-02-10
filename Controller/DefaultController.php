<?php

namespace alert\notificationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('alertnotificationBundle:Default:index.html.twig');
    }
}
