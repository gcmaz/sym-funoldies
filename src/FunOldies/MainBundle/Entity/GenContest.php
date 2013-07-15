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
class GenContest
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
    
    protected $comments;
    
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
    
    public function getComments(){
        return $this->comments;
    }
    
    public function setComments($comments){
        $this->comments = $comments;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata){
        $metadata->addPropertyConstraint('name', new NotBlank());

        $metadata->addPropertyConstraint('email', new Email());
        
        $metadata->addPropertyConstraint('phone', new NotBlank());

        $metadata->addPropertyConstraint('comments', new Length(array(
            'min'   => 10,
            'max'   => 200,
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
