<?php

namespace App\Controller;

use App\Entity\Trick;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class DeleteTrickController extends Controller
{
    /**
     * @Route("/tricks/{trickId}/delete", name="delete_trick")
     */
    public function delete(Request $request, int $trickId)
    {
        $em = $this->getDoctrine()->getManager();
        $trick = $em->getRepository(Trick::class)->find($trickId);

        if (!$trick) {
            $this->createNotFoundException();
        }

        $submittedToken = $request->request->get('token');

        if ($this->isCsrfTokenValid('delete-trick', $submittedToken)) {
            $em->remove($trick);
            $em->flush();

            $this->addFlash('success', 'La figure a bien été supprimée');

            return $this->redirect('/');
        }

        $this->addFlash('danger', 'Une erreur est survenue, la figure n\'a pas été supprimée');

        return $this->redirect('/');
    }
}
