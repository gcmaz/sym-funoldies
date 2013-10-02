<?php

namespace FunOldies\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Swift_Message;

use FunOldies\MainBundle\Controller\InstagramController;
use FunOldies\MainBundle\Controller\PetController;
use FunOldies\MainBundle\Controller\PhotosController;
use FunOldies\MainBundle\Entity\Contact;
use FunOldies\MainBundle\Form\ContactType;

class PageController extends Controller
{
    public function indexAction()
    {
        //get pet of the week for splash box
        $Pet = new PetController();
        $Pet->setContainer($this->container);
        $petData = $Pet->splashAction();
        
        //get instagram snapwidget
        $Instagram = new InstagramController();
        $Instagram->setContainer($this->container);
        $sw = $Instagram->snapwidget();

        return $this->render('FunOldiesMainBundle:Page:index.html.twig', array(
            'entities' => $petData,
            'display_blockA' => $sw[0],
            'display_blockB' => $sw[1]
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
                if($contact->getFeedme() === null){
                    //not spam
                    $message = Swift_Message::newInstance()
                        ->setSubject('Fun Oldies | Contact Form')
                        ->setFrom($contact->getEmail())
                        ->setReplyTo($contact->getEmail())
                        ->setTo($this->container->getParameter('fo.emails.contact_email'))
                        ->setBody($this->renderView('FunOldiesMainBundle:Email:contact.txt.twig', array('contact' => $contact)));
                    $this->get('mailer')->send($message);

                    $this->get('session')->getFlashBag()->add('contactnotice', 'Successfully sent!');

                    //redirect - important to prevent repost from page refresh
                    return $this->redirect($this->generateUrl('fo_contact'));
                    
                } else {
                    // spam - exit but don't send email and don't show managers page
                    return $this->redirect($this->generateUrl('fo_contact'));
                }
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
        $Photos = new PhotosController();
        $Photos->setContainer($this->container);
        $photo_block = $Photos->showPhotos();
      
        return $this->render('FunOldiesMainBundle:Page:photos.html.twig', array(
            'display_block' => $photo_block
        ));
    }
    
    public function concertsAction()
    {
        return $this->render('FunOldiesMainBundle:Page:concerts_old.html.twig');
    }

    public function communityAction()
    {
        return $this->render('FunOldiesMainBundle:Page:community.html.twig');
    }
    
    public function whatsAction()
    {
        return $this->render('FunOldiesMainBundle:Page:whats.html.twig');
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
