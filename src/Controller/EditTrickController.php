<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Entity\Video;
use App\Exception\TrickMustContainOneImageException;
use App\Form\TrickFormType;
use App\Service\DeleteTrickImages;
use App\Service\VideoUploader;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class EditTrickController extends Controller
{
    /**
     * @Route("/tricks/{trick}/edit", name="edit_trick", requirements={"trick" = "\d+"})
     */
    public function edit(Request $request, Trick $trick, DeleteTrickImages $deleteService)
    {
        $form = $this->createForm(TrickFormType::class, $trick);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trick = $form->getData();

            try {
                $deleteService->deleteImages($trick, $form);
            } catch (TrickMustContainOneImageException $e) {
                $error = new FormError('Une figure doit contenir au moins une image');
                $form->get('name')->addError($error);

                return $this->render(
                    'edit_trick.html.twig',
                    ['trick' => $trick, 'form' => $form->createView()]
                );
            }

            $trick->setUpdatedAt(new \DateTime());

            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'La figure a bien été mise à jour');
        }

        return $this->render(
            'edit_trick.html.twig',
            ['trick' => $trick, 'form' => $form->createView()]
        );
    }
}
