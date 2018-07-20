<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Trick;
use App\Form\EditTrickFormType;
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
    public function showEdit(Request $request, int $trickId)
    {
        $trick = $this->getDoctrine()->getRepository(Trick::class)->find($trickId);
//        $images = $this->getDoctrine()->getRepository(Image::class)->findBy(['trick' => $trick]);

        $form = $this->createForm(EditTrickFormType::class, $trick);
            $images = $trick->getImages();
//            dump($form); die;

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trick->setUpdatedAt(new \DateTime());


//            $trick->upload();

//            $files = $trick->getImages();
//
            foreach ($images as $file) {
                /** @var UploadedFile $file */
                $fileName = md5(uniqid()) . '.' . $file['file']->guessExtension();

                $file->move($this->getParameter('images_directory'), $fileName);
            }

//            foreach ($images as $k => $image) {
//                $image->setTrick($trick);
//            }

            $this->getDoctrine()->getManager()->flush();
        }

        return $this->render(
            'edit_trick.html.twig',
            ['trick' => $trick, 'form' => $form->createView()]
        );
    }

    public function generateUniqueFileName()
    {

    }
}
