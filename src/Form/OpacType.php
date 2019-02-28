<?php

namespace App\Form;

use App\Entity\Opac;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class OpacType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('StudentId')
            ->add('FacultyId')
            ->add('StaffId')
            ->add('BookId')
            ->add('Status', ChoiceType::class,[
                'multiple'  =>  false,
                'expanded'  =>  true,
                'required' => true,
                'choices'   => [
                    'Available' =>  "available",
                    'Borrowed' =>  "borrowed",
                    'Returned' =>  "returned",
                    'Reserved' =>  "reserved",
                    
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Opac::class,
        ]);
    }
}
