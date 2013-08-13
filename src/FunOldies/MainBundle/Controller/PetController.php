<?php

namespace FunOldies\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FunOldies\MainBundle\Entity\Pet;
use FunOldies\MainBundle\Entity\Repository\PetRepository;

class PetController extends Controller
{    
    public function showAction(){ 
        $entities = $this->potw();
        return $this->render('FunOldiesMainBundle:Page:pet.html.twig', array(
            'entities' => $entities,
        ));
    }
    
    public function splashAction(){
        $entities=$this->potw();
        return $entities;
    }
  
    private function getPetRepository() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('FunOldiesMainBundle:Pet');
        if(!$entities){
            throw $this->createNotFoundException('Unable to gather data');
        }
        return  $entities;
    }
    
    private function potw() {
        $entities = $this->getPetRepository()->getPet();
            if(!$entities){
                throw $this->createNotFoundException('Unable to find data');
            }
        return $entities;
    }
                
}
?>