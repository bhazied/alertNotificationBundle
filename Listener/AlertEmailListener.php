<?php

namespace Alert\NotificationBundle\Listener;

use Alert\NotificationBundle\Entity\Observed;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * AlertEmailListner
 *
 * @author Zied Ben Hadj Amor
 */
class AlertEmailListener
{

    protected  $alertMailer;

    protected $container;

    function __construct(AlertMailer $_alertMailer, ContainerInterface $container)
    {
        $this->alertMailer = $_alertMailer;
        $this->container = $container;
    }

    public function postPersist(LifecycleEventArgs $args){
        $entity = $args->getEntity();
        $Observed_entities = $this->container->getParameter('alert_notification.entities');
        $email_templates =  $this->container->getParameter('alert_notification.entities');
        var_dump($email_templates);
        $template = "AlertNotificationBundle:Email:alert.html.twig";
        foreach ($Observed_entities as $entityName){
            if(!class_exists($entityName)){
                return ;
            }
            if( $entity instanceof  $entityName ){
                $this->alertMailer->executeSendEmail($template);
            }
            else{
                return ;
            }
        }
    }
    
}