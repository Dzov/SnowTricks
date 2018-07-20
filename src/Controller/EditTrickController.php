<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Form\EditTrickFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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

        $form = $this->createForm(EditTrickFormType::class, $trick);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trick = $form->getData();
            $trick->setUpdatedAt(new \DateTime());

            $this->getDoctrine()->getManager()->flush();
        }

        return $this->render(
            'edit_trick.html.twig',
            ['trick' => $trick, 'form' => $form->createView()]
        );
    }
}
