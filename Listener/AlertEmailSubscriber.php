<?php

namespace Alert\NotificationBundle\Listener\AlertEmailSubscriber;

use Alert\NotificationBundle\Entity\Observed;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * AlertEmailSubscriber
 *
 * @author Zied Ben Hadj Amor
 */
class AlertEmailSubscriber implements EventSubscriber
{

    protected  $alertMailer;

    function __construct(AlertMailer $_alertMailer)
    {
        $this->alertMailer = $_alertMailer;
    }

    public function getSubscribedEvents()
    {
        // TODO: Implement getSubscribedEvents() method.
        return array(
            Event::postPersist
        );
    }

    public function postPersist(LifecycleEventArgs $args){
        $entity = $args->getEntity();
        $this->log("enter to the listner");
        if($entity instanceof Observed ){
            $entityManager = $args->getEntityManager();
            $template = "AlertNotificationBundle:Email:alert.html.twig";
            $this->alertMailer->executeSendEmail($template);
        }
        else{
            return;
        }
    }

}