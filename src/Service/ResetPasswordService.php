<?php

namespace App\Service;

use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class ResetPasswordService
{
    private $appUri;

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var TokenGeneratorInterface
     */
    private $tokenGenerator;

    public function __construct(
        $appUri,
        \Swift_Mailer $mailer,
        TokenStorageInterface $tokenStorage,
        TokenGeneratorInterface $tokenGenerator
    )
    {
        $this->appUri = $appUri;
        $this->mailer = $mailer;
        $this->tokenStorage = $tokenStorage;
        $this->tokenGenerator = $tokenGenerator;
    }

    public function send(string $email)
    {
        $token = $this->getToken($email);

        $message = (new \Swift_Message('Réinitialisez votre mot de passe'))
            ->setFrom('amelie2360@gmail.com')
            ->setTo($email)
            ->setBody(
                '<html>' .
                '<head></head>' .
                '<body>' .
                '<h1>Réinitialisation de votre mot de passe</h1>' .
                '<p>Vous avez effectué une demande de réinitialisation de votre mot de passe SnowTricks. 
                    Si vous n\'êtes pas à l\'origine de cette demande, veuillez ignorer ce message. </p>' .
                '<p> Pour définir un nouveau mot de passe, veuillez cliquer sur le lien ci-dessous.</p>' .
                '<a href="' . $this->appUri . 'reset-password?t=' . $token . '&u=' . $email . '">
                    Réiniatialiser mon mot de passe
                 </a>' .
                '</body>' .
                '</html>'
                ,
                'text/html'
            );

        $this->mailer->send($message);
    }

    private function getToken(string $email)
    {
        $token = $this->tokenGenerator->generateToken();

        $this->tokenStorage->setToken($email, $token);

        return $token;
    }

}
