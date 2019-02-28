<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\CallbackTransformer;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Username')
            ->add('roles', ChoiceType::class,[
                'multiple'  =>  false,
                'expanded'  =>  true,
                'choices'   => [
                    'Administrator'   => "ROLE_ADMIN",
                    'Librarian'         => 'ROLE_LIBRARIAN',
                ]
            ])
            ->add('LastName')
            ->add('FirstName')
            ->add('MiddleName')

        ;

        
        //roles field data transformer
        $builder->get('roles')
        ->addModelTransformer(new CallbackTransformer(
            function ($rolesArray) {
                // transform the array to a string
                return count($rolesArray)? $rolesArray[0]: null;
            },
            function ($rolesString) {
                // transform the string back to an array
                return [$rolesString];
            }
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
