<?php
//default contact entity

namespace FunOldies\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;

/**
 * @ORM\Entity
 */
class Caffeine
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    protected $name;

    protected $email;
    
    protected $phone;
    
    protected $city;
    
    protected $workplace;
    
    protected $workplaceaddy;
    
    protected $workplacetime;
    
    protected $whywin;
    
    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function setPhone($phone){
        $this->phone = $phone;
    }

    public function getCity(){
        return $this->city;
    }

    public function setCity($city){
        $this->city = $city;
    }
    
    public function getWorkplace(){
        return $this->workplace;
    }
    
    public function setWorkplace($workplace){
        $this->workplace = $workplace;
    }
    
    public function getWorkplaceaddy(){
        return $this->workplaceaddy;
    }
    
    public function setWorkplaceaddy($workplaceaddy){
        $this->workplaceaddy = $workplaceaddy;
    }
    
   public function getWorkplacetime(){
        return $this->workplacetime;
    }
    
    public function setWorkplacetime($workplacetime){
        $this->workplacetime = $workplacetime;
    }
    
    public function getWhywin(){
        return $this->whywin;
    }
    
    public function setWhywin($whywin){
        $this->whywin = $whywin;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata){
        $metadata->addPropertyConstraint('name', new NotBlank());

        $metadata->addPropertyConstraint('email', new Email());
        
        $metadata->addPropertyConstraint('phone', new NotBlank());
        
        $metadata->addPropertyConstraint('workplace', new NotBlank());
        
        $metadata->addPropertyConstraint('workplaceaddy', new NotBlank());
        
        $metadata->addPropertyConstraint('city', new NotBlank());
        
        $metadata->addPropertyConstraint('workplacetime', new NotBlank());

        $metadata->addPropertyConstraint('whywin', new Length(array(
            'min'   => 10,
            'max'   => 500,
            'minMessage'    => 'Sorry, comments must be at lease {{ limit }} characters long.',
            'maxMessage'    => 'Sorry, comments can not be longer than {{ limit }} characters.',
        )));
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
