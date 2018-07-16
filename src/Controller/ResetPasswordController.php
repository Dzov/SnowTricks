<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class ResetPasswordController extends Controller
{
    public function reset(Request $request)
    {
        $form = $this->buildForm();

        $form->handleRequest($request);

        return $this->render(
            'reset_password.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }

    private function buildForm(): FormInterface
    {
        return $this->createFormBuilder()
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
