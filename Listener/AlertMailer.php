<?php

namespace Alert\NotificationBundle\Listener;

use Symfony\Component\Config\Resource\ResourceInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\Templating\EngineInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * AlertMailer
 *
 * @author Zied Ben Hadj Amor
 */
class AlertMailer
{

    private $mailer;
    private $templating;
    private $router;
    private  $from;

    public function __construct(EngineInterface $templating, \Swift_Mailer $mailer, RouterInterface $router)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
        $this->router = $router;
        $this->from = 'contact@continuousnet.com';
    }

    /*protected function sendMail($to, $subject, $body){
        $message = \Swift_Message::newInstance();
        $message->setFrom($this->from)
            ->setTo($to)
            ->setSubject($subject)
            ->setBody($body)
            ->setContentType('text/html');
        $this->mailer->send($message);
    }*/

    protected function sendMail($to, $subject, $body)
    {
        /*
         * $message = \Swift_Message::newInstance();
        $message->setFrom($this->from)
            ->setTo($to)
            ->setSubject($subject)
            ->setBody($body)
            ->setContentType('text/html');
        $this->mailer->send($message);
        */
        $message = new \Swift_Message( );
        $message->setTo($to)
            ->setFrom($this->from)
            ->setBody($body)
            ->setContentType('text/html');
        $this->mailer->send($message);
    }
        public function executeSendEmail($template){

            $body = $this->templating->render($template, array('text' => "new row added"));
            //$body = "";
        //$this->sendMail('mr.bha.zied@gmail.com', 'new row added', $body);
            $this->sendMail('mr.bha.zied@gmail.com', 'new row added', $body);
    }

    /*public function sendNewBidEmail(User $user, Bid $bid){
        $template = 'UbidElectricityBundle:EMAILS:bidShortListes.html.twig';
        $body = $this->templating->render($template, array('newBid' => $bid));
        $to = $user->getEmail();
        $subject = '[New Bid Added]';
        $this->sendMail($to, $subject, $body);
    }

    public function sendViewProfileEmail(User $user, User $visitor){
        $template = 'UbidElectricityBundle:EMAILS:bidShortListes.html.twig';
        $body = $this->templating->render($template, array('newBid' => $visitor));
        $to = $user->getEmail();
        $subject = '[New Bid Added]';
        $this->sendMail($to, $subject, $body);
    }

    public function sendShortListBidEmail(User $user, Bid $bid){
        $template = 'UbidElectricityBundle:EMAILS:bidShortListes.html.twig';
        $body = $this->templating->render($template, array('shortList' => $bid));
        $to = $user->getEmail();
        $subject = '[New Bid Added]';
        $this->sendMail($to, $subject, $body);
    }

    public function sendNewMessageEmail(User $user, Message $message){
        $template = 'UbidElectricityBundle:EMAILS:bidShortListes.html.twig';
        $body = $this->templating->render($template, array('message' => $message));
        $to = $user->getEmail();
        $subject = '[New Bid Added]';
        $this->sendMail($to, $subject, $body);
    }

    public function sendConsultTenderEmail(User $user, Tender $tender){
        $template = 'UbidElectricityBundle:EMAILS:bidShortListes.html.twig';
        $body = $this->templating->render($template, array('tender' => $tender));
        $to = $user->getEmail();
        $subject = '[New Bid Added]';
        $this->sendMail($to, $subject, $body);

    }*/
}