<?php

namespace CrochetLibraryBundle\Form;

use CrochetLibraryBundle\Entity\Category;
use CrochetLibraryBundle\Entity\Hook;
use CrochetLibraryBundle\Entity\Yarn;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatternType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class)
            ->add('price', MoneyType::class,
                ['label' => 'Set price for your pattern'])
            ->add("hook", EntityType::class,
                array(
                    'placeholder' => 'Choose an option...',
                    'class' => Hook::class,
                    'choice_label' => 'size'
                ))
            ->add('gauge', TextType::class)
//            ->add('yarn', EntityType::class,
//                array(
//                    'class' => Yarn::class
//                ))
            ->add('yardage', TextType::class)
            ->add('patternText', TextareaType::class)
            ->add("categories", EntityType::class,
                array(
                    'class' => Category::class,
                    'choice_label' => 'name',
                    'multiple' => true,
//                    'required'   => false,
                    'empty_data' => 'John Doe'
                ))
            ->add('picture', FileType::class,
                ['label' => 'Upload your JPG file'])
            ->add('file', FileType::class,
                ['label' => 'Upload your PDF file']);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CrochetLibraryBundle\Entity\Pattern'
        ));
    }
}