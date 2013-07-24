<?php
namespace FunOldies\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AdvertiseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('feedme', 'text', array('required' => false));
        $builder->add('email', 'email');
        $builder->add('phone');
        $builder->add('comments', 'textarea', array('required' => false));
    }

    public function getName()
    {
        return 'advcontact';
    }
}

?>