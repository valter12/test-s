<?php

namespace Front\FrontBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserType extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        $builder
                ->add('email')
                ->add('fName')
                ->add('lName')
                ->add('pass')
                ->add('hasActivatedEmail')
                ->add('activationHash')
                ->add('hasPayed')
                ->add('isDeleted')
                ->add('secretHash')
                ->add('nextPayDate')
                ->add('added')
                ->add('package')
        ;
    }

    public function getName() {
        return 'front_frontbundle_usertype';
    }

}
