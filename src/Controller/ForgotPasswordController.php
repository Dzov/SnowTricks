<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
            ->getForm();
    }
}

