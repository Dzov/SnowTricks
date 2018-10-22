<?php

namespace App\Service;

use App\Entity\Image;
use App\Entity\Trick;
use App\Exception\TrickMustContainOneImageException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class DeleteTrickImages
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @throws TrickMustContainOneImageException
     */
    public function deleteImages(Trick $trick, FormInterface $form): void
    {
        $inputValue = $form->get('deleteImages')->getData();

        $inputValueArray = explode(",", $inputValue);

        $deletedImagesIds = [];
        foreach ($inputValueArray as $deletedImagesId) {
            array_push($deletedImagesIds, intval($deletedImagesId));
        }

        $images = $this->entityManager->getRepository(Image::class)->findBy(['id' => $deletedImagesIds]);

        foreach ($images as $image) {
            if (null !== $image) {
                $trick->removeImage($image);
                $this->entityManager->remove($image);
            }
        }
    }
}
