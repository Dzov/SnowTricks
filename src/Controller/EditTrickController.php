<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Entity\Video;
use App\Exception\TrickMustContainOneImageException;
use App\Form\TrickFormType;
use App\Service\DeleteTrickImages;
use App\Service\DeleteTrickVideos;
use App\Service\VideoUploader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
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
     * @Route("/tricks/{trick_id}/edit", name="edit_trick", requirements={"trick_id" = "\d+"})
     * @Entity("trick", expr="repository.findById(trick_id)")
     */
    public function edit(
        Request $request,
        Trick $trick,
        DeleteTrickImages $deleteImagesService,
        DeleteTrickVideos $deleteVideosService
    )
    {
        $form = $this->createForm(TrickFormType::class, $trick);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trick = $form->getData();

            try {
                $deleteImagesService->deleteImages($trick, $form);
            } catch (TrickMustContainOneImageException $e) {
                $error = new FormError('Une figure doit contenir au moins une image');
                $form->get('name')->addError($error);

                return $this->render(
                    'edit_trick.html.twig',
                    ['trick' => $trick, 'form' => $form->createView()]
                );
            }

            $deleteVideosService->deleteVideos($trick, $form);

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
