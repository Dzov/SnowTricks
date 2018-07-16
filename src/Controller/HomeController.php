<?php

namespace App\Controller;

use App\Entity\Trick;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class HomeController extends Controller
{
    public function home(): Response
    {
        $tricks = $this->getDoctrine()->getRepository(Trick::class)->findAll();

        return $this->render("home.html.twig", ['tricks' => $tricks]);
    }
}
