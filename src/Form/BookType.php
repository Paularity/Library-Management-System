<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Title')
            ->add('AuthorID')
            ->add('CallNumber')
            ->add('PublisherID')
            ->add('PublicationYear')
            ->add('Edition')
            ->add('Volume')
            ->add('Copyright')
            ->add('NumberOfPages')
            ->add('Description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
