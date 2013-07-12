<?php

namespace FunOldies\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use FunOldies\MainBundle\Entity\Caffeine;
use FunOldies\MainBundle\Form\CaffeineType;


class ContestController extends Controller
{
    public function contestAction($contest)
    {
        switch($contest){
            // **** DEFAULT ****
            case 'default' :
                // could display list of contests here
                return $this->render('Magic991MainBundle:Page:contest.html.twig', array(
                    'contest' => $contest
                ));

            // **** QUEEN OF CAFFEINE ****
            case 'queen-of-caffeine' :
                $data = new Caffeine ();
                $form = $this->createForm(new CaffeineType(), $data);

                $request = $this->getRequest();

                if ($request->getMethod() == 'POST'){
                     $form->bind($request);

                    if($form->isValid()){
                        $message = \Swift_Message::newInstance()
                            ->setSubject('Fun Oldies | Queen of Caffeine Entry')
                            ->setFrom($data->getEmail())
                            ->setReplyTo($data->getEmail())
                            ->setTo($this->container->getParameter('fo.emails.caffeine_email'))
                            ->setBody($this->renderView('FunOldiesMainBundle:Email:caffeine.txt.twig', array('data' => $data)));
                        $this->get('mailer')->send($message);

                        $this->get('session')->getFlashBag()->add('caffeinenotice', 'Successfully sent!');

                        //redirect - important to prevent repost from page refresh
                        return $this->redirect($this->generateUrl('fo_contest', array('contest' => 'queen-of-caffeine')));
                    }
                }
                return $this->render('FunOldiesMainBundle:Contest:caffeine.html.twig', array(
                    'form' => $form->createView()
                ));

            // **** MUSIC AND MONEY ****
            case 'music-and-money' :
                return $this->render('FunOldiesMainBundle:Contest:musicandmoney.html.twig', array(
                    'contest' => $contest
                ));

            // **** KINGSMEN SURFARIS ****
            case 'kingsmen-surfaris' :
                return $this->render('FunOldiesMainBundle:Contest:kingsmensurfaris.html.twig', array(
                    'contest' => $contest
                ));
        }
    }
}
?>
