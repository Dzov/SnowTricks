<?php

namespace App\Controller;

use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class LoginController extends Controller
{
    public function login(Request $request): Response
    {
        $form = $this->createForm(LoginType::class);

        $form->handleRequest($request);

        return $this->render(
            'login.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }
}
