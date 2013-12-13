<?php

namespace FunOldies\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SplashController extends Controller
{
    public function splashAction($splash)
    {
        switch($splash){
            // COULD RETURN LIST OF SPLASH PAGES
            case 'default' :
                return $this->render('FunOldiesMainBundle:Splash:default.html.twig', array(
                    'splash' => $splash
                ));

            // BOOT DROP
            case 'boot-drop-prescott-2014' :
                return $this->render('FunOldiesMainBundle:Splash:bootdrop.html.twig', array(
                    'splash' => $splash
                )); 
                
            // GIFT OF WARMTH
            case 'gift-of-warmth-coat-drive' :
                return $this->render('FunOldiesMainBundle:Splash:giftofwarmth.html.twig', array(
                    'splash' => $splash
                )); 
                
            // TEACHERS APPRECIATION NIGHT
            case 'teachers-appreciation-night' :
                return $this->render('FunOldiesMainBundle:Splash:teachersnight.html.twig', array(
                    'splash' => $splash
                ));                
        }
    }
    
}
?>