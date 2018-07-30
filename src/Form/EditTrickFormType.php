<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Trick;
use App\Form\Type\ImageType;
use Doctrine\Common\Collections\Collection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @author Amélie-Dzovinar Haladjian
 */
class EditTrickFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): FormInterface
    {
        return $builder
            ->add(
                'category',
                EntityType::class,
                array(
                    'class'        => Category::class,
                    'choice_label' => 'name',
                    'attr'         => array('class' => 'form-control'),
                    'label'        => 'Groupe'
                )
            )
            ->add(
                'description',
                TextareaType::class,
                array(
                    'attr'        => array('class' => 'form-control'),
                    'label'       => 'Description',
                    'required'    => true,
                    'constraints' => array(new NotBlank())
                )
            )
            ->add(
                'name',
                TextType::class,
                array(
                    'attr'        => array('class' => 'form-control'),
                    'label'       => 'Nom de la figure',
                    'required'    => true,
                    'constraints' => array(new NotBlank())
                )
            )
            ->add(
                'images',
                CollectionType::class,
                array(
                    'attr'          => array('class' => 'form-control'),
                    'entry_type'    => ImageType::class,
                    'entry_options' => array(
                        'label' => false,
                    ),
                    'allow_add'     => true,
                    'allow_delete'  => true,
                    'required'      => false,
                )
            )
//            ->add(
//                'videos',
//                CollectionType::class,
//                array(
//                    'attr'  => array('class' => 'form-control'),
//                    'label' => 'Mot de passe'
//                )
//            )
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => Trick::class,
            ]
        );
    }
}
