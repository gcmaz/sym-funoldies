<?php

namespace FunOldies\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use FunOldies\MainBundle\Entity\Caffeine;
use FunOldies\MainBundle\Form\CaffeineType;
use FunOldies\MainBundle\Entity\GenContest;
use FunOldies\MainBundle\Form\GenContestType;


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
                
                
            // 2013 NISSAN VERSA NOTE
            case 'win-a-nissan-versa-note' :  
                return $this->render('FunOldiesMainBundle:Contest:nissanversa.html.twig', array(
                    'contest' => $contest
                ));
                
            // **** BEATLES VS STONES ****
            case 'beatles-vs-stones' :
                $data = new GenContest ();
                $form = $this->createForm(new GenContestType(), $data);

                $request = $this->getRequest();

                if ($request->getMethod() == 'POST'){
                     $form->bind($request);

                    if($form->isValid()){
                        $message = \Swift_Message::newInstance()
                            ->setSubject('Fun Oldies | Beatles vs. Stones Entry')
                            ->setFrom($data->getEmail())
                            ->setReplyTo($data->getEmail())
                            ->setTo($this->container->getParameter('fo.emails.gencontest_email'))
                            ->setBody($this->renderView('FunOldiesMainBundle:Email:beatlesvsstones.txt.twig', array('data' => $data)));
                        $this->get('mailer')->send($message);

                        $this->get('session')->getFlashBag()->add('bvssnotice', 'Successfully sent!');

                        //redirect - important to prevent repost from page refresh
                        return $this->redirect($this->generateUrl('fo_contest', array('contest' => 'beatles-vs-stones')));
                    }
                }
                return $this->render('FunOldiesMainBundle:Contest:beatlesvsstones.html.twig', array(
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
