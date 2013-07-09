<?php

namespace FunOldies\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FunOldies\MainBundle\Entity\Contact;
use FunOldies\MainBundle\Form\ContactType;

class PageController extends Controller
{
    public function indexAction()
    {
        $display_blockA = "";
        $display_blockB = "";
        include_once('inc/instagramSnapWidget.php');
        return $this->render('FunOldiesMainBundle:Page:index.html.twig', array(
            'display_blockA' => $display_blockA,
            'display_blockB' => $display_blockB
        ));
    }
    
    public function contactAction()
    {
        $contact = new Contact ();
        $form = $this->createForm(new ContactType(), $contact);
        
        $request = $this->getRequest();
        
        if ($request->getMethod() == 'POST'){
             $form->bind($request);
            
            if($form->isValid()){
                $message = \Swift_Message::newInstance()
                    ->setSubject('Fun Oldies | Contact Form')
                    ->setFrom($contact->getEmail())
                    ->setReplyTo($contact->getEmail())
                    ->setTo($this->container->getParameter('fo.emails.contact_email'))
                    ->setBody($this->renderView('FunOldiesMainBundle:Email:contact.txt.twig', array('contact' => $contact)));
                $this->get('mailer')->send($message);
                
                $this->get('session')->getFlashBag()->add('contactnotice', 'Successfully sent!');
                
                //redirect - important to prevent repost from page refresh
                return $this->redirect($this->generateUrl('fo_contact'));
            }
        }
        return $this->render('FunOldiesMainBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
        public function onairAction()
    {
        return $this->render('FunOldiesMainBundle:Page:onair.html.twig');
    }
    
    public function photosAction()
    {
        $display_block = "";
        include_once('inc/photosEmbed.php');
        return $this->render('FunOldiesMainBundle:Page:photos.html.twig', array(
            'display_block' => $display_block
        ));
    }
    
    public function concertsAction()
    {
        return $this->render('FunOldiesMainBundle:Page:concerts.html.twig');
    }

    public function communityAction()
    {
        return $this->render('FunOldiesMainBundle:Page:community.html.twig');
    }
    
    public function whatsAction()
    {
        return $this->render('FunOldiesMainBundle:Page:whats.html.twig');
    }
    
    public function petAction()
    {
        return $this->render('FunOldiesMainBundle:Page:pet.html.twig');
    }
    
    public function jobsAction()
    {
        return $this->render('FunOldiesMainBundle:Page:jobs.html.twig');
    }
    
    public function weatherAction()
    {
        return $this->render('FunOldiesMainBundle:Page:weather.html.twig');
    }
    
}
