<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class LoginController extends Controller
{
    public function login(Request $request): Response
    {
        $form = $this->buildForm();

        $form->handleRequest($request);

        return $this->render(
            'login.html.twig',
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
