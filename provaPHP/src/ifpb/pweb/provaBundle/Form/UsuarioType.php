<?php

namespace ifpb\pweb\provaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('email', 'email', array(
            	'label' => 'E-mail'		
        	))
            ->add('senha', 'password')
            ->add('privilegio', 'choice', array(
            		'choices' => array(
            		'admin' => 'Administrador', 
            		'convidado' => 'Convidado')) )
            ->add('telefone')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ifpb\pweb\provaBundle\Entity\Usuario',
        	'csrf_protection' => true,
        	'csrf_field_name' => '_token'
        ));
    }

    public function getName()
    {
        return 'ifpb_pweb_provabundle_usuariotype';
    }
}
