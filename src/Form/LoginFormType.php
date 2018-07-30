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
class LoginFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): FormInterface
    {
        return $builder
            ->add(
                '_username',
                TextType::class,
                array(
                    'attr'  => array('class' => 'form-control'),
                    'label' => 'Email',
                )
            )
            ->add(
                '_password',
                PasswordType::class,
                array(
                    'attr'  => array('class' => 'form-control'),
                    'label' => 'Mot de passe',
                )
            )
            ->getForm();
    }

    public function getBlockPrefix()
    {
        return null;
    }
}
