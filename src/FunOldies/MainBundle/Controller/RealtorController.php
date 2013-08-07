<?php

namespace FunOldies\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FunOldies\MainBundle\Entity\Realtor;

class RealtorController extends Controller
{
    public function show2Action()
    { 
        return $this->render('FunOldiesMainBundle:Page:realtor2.html.twig');
    }  
    
    // begin cms version
    
    private function getRealtorRepository() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('FunOldiesMainBundle:Realtor');
        if(!$entities){
            throw $this->createNotFoundException('Unable to gather data');
        }
        return  $entities;
    }

    public function showAction()
    { 
        $entities = $this->getRealtorRepository()->getListing();

        if(!$entities){
            throw $this->createNotFoundException('Unable to find data');
        }
        
        return $this->render('FunOldiesMainBundle:Page:realtor.html.twig', array(
            'entities' => $entities,
        ));
    }  
                
}
?>