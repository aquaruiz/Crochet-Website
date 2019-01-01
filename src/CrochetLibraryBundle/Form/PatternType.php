<?php

namespace CrochetLibraryBundle\Form;

use CrochetLibraryBundle\Entity\Hook;
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
//            ->add('publishedDate', DateType::class)
            ->add("hook", EntityType::class,
                array(
                    'class' =>Hook::class,
                    'choice_label' => 'size'
                ))
            ->add('gauge', TextType::class)
            ->add('yardage', TextType::class)
            ->add('patternText', TextareaType::class)
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