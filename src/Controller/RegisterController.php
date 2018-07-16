<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class RegisterController extends Controller
{
    public function register(): Response
    {
        $form = $this->createFormBuilder()
            ->add(
                'firstName',
                TextType::class,
                array(
                    'attr' => array('class' => 'form-control'),
                    'label' => 'Prénom'
                )
            )
            ->add(
                'lastName',
                TextType::class,
                array(
                    'attr' => array('class' => 'form-control'),
                    'label' => 'Nom de famille'
                )
            )
            ->add(
                'email',
                EmailType::class,
                array(
                    'attr' => array('class' => 'form-control'),
                    'label' => 'Email'
                )
            )
            ->add(
                'password',
                PasswordType::class,
                array(
                    'attr' => array('class' => 'form-control'),
                    'label' => 'Mot de passe'
                )
            )
            ->getForm();

        return $this->render(
            'register.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }
}
