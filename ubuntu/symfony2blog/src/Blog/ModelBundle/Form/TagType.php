<?php
/**
 * Created by PhpStorm.
 * User: botondev
 * Date: 2018.06.17.
 * Time: 15:59
 */

namespace Blog\ModelBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TagType extends AbstractType
{
    /**
     * {@inheritdoc}
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
    }

    /**
     * {@inheritdoc}
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Blog\ModelBundle\Entity\Tag'
        ));
    }

    /**
     * {@inheritdoc}
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'blog_modelbundle_tag';
    }
}