<?php
namespace FunOldies\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FunOldies\MainBundle\Entity\Advertise;
use FunOldies\MainBundle\Form\AdvertiseType;

class AdvertiseController extends Controller
{
        public function enterAction()
        {
            if($this->get('session')->get('advauth') == 1){
                // already entered info, re-entering page
                return $this->redirect($this->generateUrl('fo_advertise_show', array('show' => 'contacts')));
            }            
            $advcontact = new Advertise();
            $form = $this->createForm(new AdvertiseType(), $advcontact);
            $request = $this->getRequest();
            if ($request->getMethod() == 'POST'){
                $form->bind($request);

                if($form->isValid()){
                    //perform action
                    $message = \Swift_Message::newInstance()
                        ->setSubject('Fun Oldies | Advertising Form')
                        ->setFrom('advertise@funoldiesnow.com')
                        ->setTo($this->container->getParameter('fo.emails.advertise_email'))
                        ->setBody($this->renderView('FunOldiesMainBundle:Email:advertise.txt.twig', array('advcontact' => $advcontact)));
                    $this->get('mailer')->send($message);
                    
                    $this->get('session')->getFlashBag()->add('advnotice', 'Successfully sent!');
                    $this->get('session')->set('advauth', 1);
                    
                    //redirect - important to prevent repost from page refresh
                    return $this->redirect($this->generateUrl('fo_advertise_show', array('show' => 'contacts')));
                }
            }
            return $this->render('FunOldiesMainBundle:Page:advertise.html.twig', array(
                'form' => $form->createView()
            ));
        }
        
        public function showAction($show)
        {
            return $this->render('FunOldiesMainBundle:Page:advertise.html.twig', array(
                'show' => $show,
            ));
        }
}
?>
