<?php

namespace App\Controller;

use App\Entity\User;
use App\Exception\PasswordResetTokenNotFoundException;
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
    public function reset(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $form = $this->createForm(ResetPasswordFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if (!$this->tokenIsValid($request->get('t'))) {
                $this->addFlash('warning', 'Le lien a expiré, veuillez refaire une demande');

                return $this->redirectToRoute('forgot_password');
            }

            $this->setNewPassword($passwordEncoder, $form, $this->getTokenUser($request->get('t')));

            $this->addFlash('success', 'Votre mot de passe a bien été enregistré');

            return $this->redirectToRoute('login');
        }

        return $this->render(
            'reset_password.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }

    private function tokenIsValid(string $token)
    {
        $user = $this->getTokenUser($token);

        $now = new \DateTime();
        $duration = date_diff($user->getPasswordResetDate(), $now);
        if ($duration->i > 10) {
            return false;
        }

        return true;
    }

    private function setNewPassword(
        UserPasswordEncoderInterface $passwordEncoder,
        FormInterface $form,
        User $user
    ): void
    {
        $password = $passwordEncoder->encodePassword($user, $form->get('password')->getData());
        $user->setPassword($password);

        $this->getDoctrine()->getManager()->flush();
    }

    private function getTokenUser(string $token): ?User
    {
        try {
            $em = $this->getDoctrine()->getManager();

            return $em->getRepository(User::class)->findByPasswordResetToken($token);
        } catch (PasswordResetTokenNotFoundException $e) {
            throw $this->createNotFoundException('Cette demande ne correspond à aucun utilisateur');
        }
    }
}
