<?php

namespace App\Validator\Constraints;

use App\Service\VideoUploader;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class VideoUrlConstraintValidator extends ConstraintValidator
{
    /**
     * @var VideoUploader
     */
    private $videoUploader;

    public function __construct(VideoUploader $videoUploader)
    {
        $this->videoUploader = $videoUploader;
    }

    public function validate($value, Constraint $constraint)
    {
        if (null === $this->videoUploader->parseUrl($value)) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }

    public function setVideoUploader(VideoUploader $videoUploader)
    {
        $this->videoUploader = $videoUploader;
    }
}
