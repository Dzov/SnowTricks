<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterFormType;
use App\Service\SendValidationEmail;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class RegisterController extends Controller
{
    /**
     * @Route("/sign-up", name="sign_up")
     */
    public function register(
        Request $request,
        UserPasswordEncoderInterface $passwordEncoder,
        TokenGeneratorInterface $generator,
        SendValidationEmail $validationEmailService
    )
    {
        $user = new User();

        $form = $this->createForm(RegisterFormType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $token = $generator->generateToken();

            $user = $this->createUser($passwordEncoder, $form, $token);

            $validationEmailService->send($user, $token);

            $this->addFlash(
                'info',
                'Votre inscription est bien enregistrée ! Un mail de confirmation vous a été envoyé, cliquez sur le lien pour activer votre compte.'
            );

            return $this->redirectToRoute('home');
        }

        return $this->render(
            'register.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }

    /**
     * @Route("/validate", name="validate_user")
     * @Method({"GET"})
     */
    public function validate(Request $request)
    {
        $token = $request->get('t');

        if (!$token) {
            return new Response(new InvalidCsrfTokenException());
        }

        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['id' => $request->get('u')]);

        if (!$user) {
            throw $this->createNotFoundException();
        }

        $this->activateUser($user, $token);

        return $this->redirectToRoute('home');
    }

    private function createUser(UserPasswordEncoderInterface $passwordEncoder, FormInterface $form, string $token): User
    {
        $user = $form->getData();

        $password = $passwordEncoder->encodePassword($user, $user->getPassword());
        $user->setPassword($password);

        $user->setToken($token);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return $user;
    }

    private function activateUser(User $user, string $token): void
    {
        if ($user->getToken() === $token) {
            $user->activate();
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Votre compte a été activé');
        }
    }
}
