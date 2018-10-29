<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @author Amélie-Dzovinar Haladjian
 *
 * @Annotation
 */
class VideoUrlConstraint extends Constraint
{
    public $message = 'Votre video doit provenir de youtube, vimeo, ou dailymotion';
}
