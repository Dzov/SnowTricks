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
            ->setBody($this->appUri . 'validate?u=' . $user->getId() . '&t=' . $token);

        $this->mailer->send($message);
    }
}
