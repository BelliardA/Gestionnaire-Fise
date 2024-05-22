<?php

namespace App\Form;

use App\Entity\Epreuve;
use App\Entity\Lieu;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EpreuveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('degre')
            ->add('date', null, [
                'widget' => 'single_text'
            ])
            ->add('sport')
            ->add('lieu', EntityType::class, [
                'class' => Lieu::class,
'choice_label' => 'nom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Epreuve::class,
        ]);
    }
}
