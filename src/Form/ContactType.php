<?php

namespace App\Form;

use App\Entity\Adherent;
use App\Entity\Formation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
            ])
            ->add('email', EmailType::class, [
                'empty_data' => '',
                'label' => 'Email'
            ])
            ->add('statut', ChoiceType::class, [
                'label' => 'Je suis...',
                'choices' => [
                    'En CDI' => 'En CDI',
                    'En CDD' => 'En CDD',
                    'En intérim' => 'Intérim'
            ]])
            ->add('idFormation', EntityType::class, [
                'class' => Formation::class,
                'choice_label' => 'nom',
                'label' => 'La formation'
            ])
            ->add('adresse', TextareaType::class, [
                'label' => "Adresse"
            ])
            ->add('telephone', TelType::class, [
                'label' => 'Téléphone'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adherent::class,
        ]);
    }
}
