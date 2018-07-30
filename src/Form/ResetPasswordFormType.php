<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class ResetPasswordFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): FormInterface
    {
       return $builder
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
}
