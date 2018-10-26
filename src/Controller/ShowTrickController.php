<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Trick;
use App\Form\CommentFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class ShowTrickController extends Controller
{
    /**
     * @Route("/tricks/{trick}", name="show_trick", requirements={"trick" = "\d+"})
     */
    public function show(Request $request, Trick $trick)
    {
        $comment = new Comment();
        $form = $this->createForm(CommentFormType::class, $comment);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment = $form->getData();

            $comment->setTrick($trick);
            $comment->setUser($this->getUser());
            $comment->setPostedAt(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();
        }

        return $this->render('trick_information.html.twig', ['trick' => $trick, 'form' => $form->createView()]);
    }
}
