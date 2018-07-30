<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class ForgotPasswordController extends Controller
{
    public function forgotPassword(Request $request): Response
    {
        $form = $this->buildForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            return $this->render('reset_mail_confirmation.html.twig');
        }

        return $this->render(
            'forgot_password.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }
}

