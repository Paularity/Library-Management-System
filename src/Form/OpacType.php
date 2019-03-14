<?php

namespace App\Form;

use App\Entity\Opac;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OpacType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('StudentId')
            ->add('FacultyId')
            ->add('StaffId')
            ->add('BookId')
            ->add('Status')
            ->add('DateCreated')
            ->add('DateUpdated')
            ->add('DateDue')
            ->add('penalty')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Opac::class,
        ]);
    }
}
