<?php

namespace App\Service;

use App\Entity\Trick;
use App\Entity\Video;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class DeleteTrickVideos
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function deleteVideos(Trick $trick, FormInterface $form): void
    {
        $deletedVideosInputValue = $form->get('deleteVideos')->getData();

        $deletedVideosInputValueArray = explode(",", $deletedVideosInputValue);

        $deletedVideosIds = [];
        foreach ($deletedVideosInputValueArray as $deletedVideosId) {
            array_push($deletedVideosIds, intval($deletedVideosId));
        }

        $videos = $this->entityManager->getRepository(Video::class)->findBy(['id' => $deletedVideosIds]);

        foreach ($videos as $video) {
            if (null !== $video) {
                $trick->removeVideo($video);
                $this->entityManager->remove($video);
            }
        }
    }
}
