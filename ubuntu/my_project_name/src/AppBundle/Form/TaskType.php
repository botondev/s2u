<?php
/**
 * Created by PhpStorm.
 * User: botondev
 * Date: 2018.06.16.
 * Time: 17:56
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('task', 'Symfony\Component\Form\Extension\Core\Type\TextType')
            ->add('dueDate', 'Symfony\Component\Form\Extension\Core\Type\DateType')
            ->add('agreeTerms', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType',
                array('mapped' => false))
            ->add('save', 'Symfony\Component\Form\Extension\Core\Type\SubmitType',
                array('label' => 'Create Task'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Task'
        ));
    }
}