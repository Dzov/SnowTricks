<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Trick;
use App\Form\TrickFormType;
use App\Service\ImageUploader;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class EditTrickController extends Controller
{
    /**
     * @Route("/tricks/{trickId}/edit", name="edit_trick", requirements={"id" = "\d+"})
     */
    public function edit(Request $request, int $trickId, ImageUploader $uploader)
    {
        $trick = $this->getDoctrine()->getRepository(Trick::class)->find($trickId);

        $form = $this->createForm(TrickFormType::class, $trick);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trick = $form->getData();
            $trick->setUpdatedAt(new \DateTime());

            $uploader->uploadTrickImages($trick);

            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'La figure a bien été mise à jour');
        }

        return $this->render(
            'edit_trick.html.twig',
            ['trick' => $trick, 'form' => $form->createView()]
        );
    }
}
