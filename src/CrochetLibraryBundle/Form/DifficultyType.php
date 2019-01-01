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
                        'Yes' => true,
                        'No' => false,
                        'Maybe' => null)
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
