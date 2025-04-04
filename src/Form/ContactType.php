<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom', TextType::class, [
                'required' => true,
                'label' => false,
                'attr' => [
                    "placeholder" => "Nom",
                    "class" => " form-control w-100"
                ]
            ])
            ->add('Prenom', TextType::class, [
                'required' => true,
                'label' => false,
                'attr' => [
                    "placeholder" => "Prénom",
                    "class" => " form-control w-100"
                ]
            ])
            ->add('Telephone', TextType::class,[
                'required' => true,
                'label' => false,
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Regex([
                        'pattern' => '/^\d{10}$/',
                        'message' => 'Le numéro de téléphone doit contenir exactement 10 chiffres.',
                    ]),
                ],
                'attr' => [ 
                    "placeholder" => "Téléphone",
                    "class" => " form-control w-100 mb-3"
                ]
            ])
            ->add('Email', TextType::class, [
                'required' => true,
                'label' => false,
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Email([
                        'message' => 'Veuillez entrer une adresse email valide.',
                    ]),
                ],
                'attr' => [
                    "placeholder" => "E-mail",
                    "class" => " form-control w-100 mb-3"
                ]
            ])
            ->add('Message', TextareaType::class, [
                'required' => true,
                'label' => false,
                'attr' => [
                    "placeholder" => "Message",
                    "class" => " form-control w-100",
                    "rows" => 5
                ]
            ])
            ->add('save', SubmitType::class, [
                'attr' => [
                    "class" => " form-control w-100 mt-3",
                ]
            ])    

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
