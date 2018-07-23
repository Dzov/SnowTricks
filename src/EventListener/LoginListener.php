<?php

namespace App\EventListener;

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class LoginListener
{
    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $user = $event->getAuthenticationToken()->getUser();

        $event->getRequest()->getSession()->getFlashBag()->add('info', 'Bienvenue ' . $user->getFirstName() . ' !');
    }
}
