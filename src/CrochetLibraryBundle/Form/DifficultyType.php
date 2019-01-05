<?php

namespace CrochetLibraryBundle\Form;

use CrochetLibraryBundle\Entity\Difficulty;
use CrochetLibraryBundle\Entity\Hook;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DifficultyType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("level", ChoiceType::class,
                array(
                    'placeholder' => 'Choose an option...',
                    'choices' => array(
                        '10' => 10,
                        '9' => 9,
                        '8' => 8,
                        '7' => 7,
                        '6' => 6,
                        '5' => 5,
                        '4' => 4,
                        '3' => 3,
                        '2' => 2,
                        '1' => 1)
                )
            );
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CrochetLibraryBundle\Entity\Difficulty'
        ));
    }
}
