<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Trick;
use App\Form\TrickFormType;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
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

        $form = $this->createForm(TrickFormType::class, $trick);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            return $this->addTrick($trick);
        }

        return $this->render(
            'add_trick.html.twig',
            ['form' => $form->createView(), 'trick' => $trick]
        );
    }

    private function addTrick(Trick $trick): RedirectResponse
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($trick);
        $em->flush();

        $this->addFlash('success', 'La figure a bien été créée');

        return $this->redirectToRoute('edit_trick', ['trick' => $trick->getId()]);
    }
}
