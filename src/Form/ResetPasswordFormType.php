<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class ResetPasswordFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): FormInterface
    {
        return $builder->add(
            'password',
            RepeatedType::class,
            array(
                'type'            => PasswordType::class,
                'invalid_message' => 'Les champs doivent être identiques',
                'options'         => array('attr' => array('class' => 'password-field form-control')),
                'required'        => true,
                'first_options'   => array('label' => 'Mot de passe'),
                'second_options'  => array('label' => 'Confirmez le mot de passe'),
            )
        )->getForm();
    }
}
