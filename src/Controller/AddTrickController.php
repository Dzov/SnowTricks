<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Trick;
use App\Form\EditTrickFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class AddTrickController extends Controller
{
    /**
     * @Route("trick/add", name="add_trick")
     */
    public function add(Request $request)
    {
        $trick = new Trick();
        $trick->addImage(new Image());
        $trick->addImage(new Image());

        $form = $this->createForm(EditTrickFormType::class, $trick);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trick->setCreatedAt(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($trick);
            $em->flush();

            $this->addFlash('success', 'La figure a bien été créée');

            return $this->redirect('/');
        }

        return $this->render(
            'add_trick.html.twig',
            ['form' => $form->createView(), 'trick' => $trick]
        );
    }
}