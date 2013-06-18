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
class Contact
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

    protected $department;
    
    protected $comments;
    
    protected $workplace;
    
    protected $workplaceaddy;
    
    protected $workplacetotal;
    
    protected $whywin;
    
    protected $generic1;
    
    protected $generic2;
    
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
    
   public function getDepartment(){
        return $this->department;
    }

    public function setDepartment($department){
        $this->department = $department;
    }
    
   public function getComments(){
        return $this->comments;
    }

    public function setComments($comments){
        $this->comments = $comments;
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
    
    public function getWorkplacetotal(){
        return $this->workplacetotal;
    }
    
    public function setWorkplacetotal($workplacetotal){
        $this->workplacetotal = $workplacetotal;
    }
    
    public function getWhywin(){
        return $this->whywin;
    }
    
    public function setWhywin($whywin){
        $this->whywin = $whywin;
    }
    
    public function getGeneric1(){
        return $this->generic1;
    }

    public function setGeneric1($generic1){
        $this->generic1 = $generic1;
    }
    
    public function getGeneric2(){
        return $this->generic2;
    }

    public function setGeneric2($generic2){
        $this->generic2 = $generic2;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata){
        $metadata->addPropertyConstraint('name', new NotBlank());

        $metadata->addPropertyConstraint('email', new Email());

        $metadata->addPropertyConstraint('comments', new Length(array(
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
