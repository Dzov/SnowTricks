<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ResetPasswordFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class ResetPasswordController extends Controller
{
    /**
     * @Route("/reset-password", name="reset_password")
     */
    public function reset(
        Request $request,
        TokenStorageInterface $tokenStorage,
        UserPasswordEncoderInterface $passwordEncoder
    )
    {
        $form = $this->createForm(ResetPasswordFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $token = $tokenStorage->getToken($request->get('u'));
            if ($token === $request->get('t')) {
                $this->setNewPassword($request, $passwordEncoder, $form);

                $this->addFlash('success', 'Votre mot de passe a bien été enregistré');

                return $this->redirectToRoute('login');
            } else {
                $this->addFlash('Notice', 'Le lien a expiré, veuillez refaire une demande');

                return $this->redirectToRoute('forgot_password');
            }

        }

        return $this->render(
            'reset_password.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }

    private function setNewPassword(
        Request $request,
        UserPasswordEncoderInterface $passwordEncoder,
        FormInterface $form
    ): void
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->loadUserByUsername($request->get('u'));
        /**
         * @var User $user
         */
        $password = $passwordEncoder->encodePassword($user, $form->get('password')->getData());
        $user->setPassword($password);

        $this->getDoctrine()->getManager()->flush();
    }
}
