<?php

namespace App\Controller;

use App\Form\ForgotPasswordFormType;
use App\Service\ResetPasswordService;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class ForgotPasswordController extends Controller
{
    /**
     * @Route("/forgot-password", name="forgot_password")
     */
    public function forgotPassword(
        Request $request,
        ResetPasswordService $resetPasswordService
    ): Response
    {
        $form = $this->createForm(ForgotPasswordFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = $form->get('email')->getData();

            $resetPasswordService->send($email);

            return $this->render(
                'reset_mail_confirmation.html.twig',
                ['email' => $email]
            );
        }

        return $this->render(
            'forgot_password.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }
}

