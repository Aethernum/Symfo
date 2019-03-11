<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Evenement;
use App\Entity\Client;
use App\Entity\TypeEvenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomEvenement',TextType::class, ["required"=>true])
            ->add('Date')
            ->add('HeureDebut')
            ->add('HeureFin')
            ->add('NombrePlace')
            ->add('CategoriePlace')
            ->add('Clients',EntityType::class, [
                // looks for choices from this entity
                'class' => Client::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => 'nomClient',
                "multiple"=>true,
                "required"=>false])
            ->add('TypeEvenements',EntityType::class, [
                // looks for choices from this entity
                'class' => TypeEvenement::class,
            
                // uses the User.username property as the visible option string
                ], ["required"=>false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
