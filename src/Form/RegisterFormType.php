<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class RegisterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): FormInterface
    {
        return $builder
            ->add(
                'firstName',
                TextType::class,
                array(
                    'attr'  => array('class' => 'form-control'),
                    'label' => 'Prénom'
                )
            )
            ->add(
                'lastName',
                TextType::class,
                array(
                    'attr'  => array('class' => 'form-control'),
                    'label' => 'Nom de famille'
                )
            )
            ->add(
                'email',
                EmailType::class,
                array(
                    'attr'  => array('class' => 'form-control'),
                    'label' => 'Email'
                )
            )
            ->add(
                'password',
                PasswordType::class,
                array(
                    'attr'  => array('class' => 'form-control'),
                    'label' => 'Mot de passe'
                )
            )
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => User::class,
            ]
        );
    }
}
