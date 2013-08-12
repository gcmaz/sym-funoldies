<?php

namespace FunOldies\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FunOldies\MainBundle\Entity\Pet;

class PetController extends Controller
{
    
    private function getPetRepository() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('FunOldiesMainBundle:Pet');
        if(!$entities){
            throw $this->createNotFoundException('Unable to gather data');
        }
        return  $entities;
    }
    
    public function showAction()
    { 
        $entities = $this->getPetRepository()->getPet();

        if(!$entities){
            throw $this->createNotFoundException('Unable to find data');
        }
        
        return $this->render('FunOldiesMainBundle:Page:pet.html.twig', array(
            'entities' => $entities,
        ));
    }  
                
}
?>