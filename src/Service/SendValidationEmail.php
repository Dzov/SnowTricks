<?php

namespace App\Service;

use App\Entity\User;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class SendValidationEmail
{
    private $appUri;

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    public function __construct($appUri, \Swift_Mailer $mailer)
    {
        $this->appUri = $appUri;
        $this->mailer = $mailer;
    }

    public function send(User $user, string $token)
    {
        $message = (new \Swift_Message('Votre inscription sur SnowTricks'))
            ->setFrom('amelie2360@gmail.com')
            ->setTo('amelie2360@gmail.com')
            ->setBody(
                '<html>' .
                '<head></head>' .
                '<body>' .
                '<h1>Bienvenue dans la communauté SnowTricks !</h1>' .
                '<p>Vous pourrez bientôt profiter pleinement de la plateforme et contribuer à votre tour ! Il vous suffit à présent de valider votre inscription.
                    Pour se faire, veuillez cliquer sur le lien ci-dessous:</p>' .
                '<a href="' . $this->appUri . 'validate?u=' . $user->getId() . '&t=' . $token . '">
                    Valider mon inscription
                 </a>' .
                '</body>' .
                '</html>'
                ,
                'text/html'
            );

        $this->mailer->send($message);
    }
}
