<?php

namespace App\Controller;

use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class LoginController extends Controller
{
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

//        $form = $this->createForm(LoginType::class, ['_username' => $lastUsername]);

        return $this->render(
            'login.html.twig',
            array(
                'lastUsername' => $lastUsername,
                'error'        => $error,
//                'form'         => $form->createView()
            )
        );
    }
}
