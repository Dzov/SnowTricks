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

    public function __construct(
        $appUri,
        \Swift_Mailer $mailer,
        TokenGeneratorInterface $tokenGenerator
    )
    {
        $this->appUri = $appUri;
        $this->mailer = $mailer;
    }

    public function send(string $email, string $token)
    {
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
                '<a href="' . $this->appUri . 'reset-password?t=' . $token . '">
                    Réiniatialiser mon mot de passe
                 </a>' .
                '</body>' .
                '</html>'
                ,
                'text/html'
            );

        $this->mailer->send($message);
    }
}
