<?php

namespace App\Controller;

use App\Form\ResetPasswordFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class ResetPasswordController extends Controller
{
    /**
     * @Route("/reset", name="reset")
     */
    public function reset(Request $request)
    {
        $form = $this->createForm(ResetPasswordFormType::class);

        $form->handleRequest($request);

        return $this->render(
            'reset_password.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }
}
