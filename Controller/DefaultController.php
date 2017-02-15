<?php

namespace Alert\NotificationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Alert\NotificationBundle\Entity\Observed;
class DefaultController extends Controller
{
    public function indexAction()
    {
        $ob = new Observed();
        $ob->setSubject("subject");
        $ob->setOther("other");
        $ob->setTitle("Title");
        $em = $this->getDoctrine()->getManager();
        $em->persist($ob);
        $em->flush();
        return $this->render('alertnotificationBundle:Default:index.html.twig');
    }
}
