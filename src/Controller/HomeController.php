<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class HomeController extends Controller
{
    public function home(): Response
    {
        return $this->render("home.html.twig");
    }
}
