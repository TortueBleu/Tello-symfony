<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('timestamp')
            ->add('users', EntityType::class, [
            // looks for choices from this entity
            'class' => User::class,

            // uses the User.username property as the visible option string
            'choice_label' => 'name',

            // used to render a select box, check boxes or radios
            'multiple' => true,
            'expanded' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
