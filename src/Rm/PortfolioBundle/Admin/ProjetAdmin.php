<?php
/**
 * Created by PhpStorm.
 * User: remim
 * Date: 04/12/2017
 * Time: 12:02
 */

namespace Rm\PortfolioBundle\Admin;


use Rm\MainBundle\Form\ImageType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilder;

class ProjetAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nom', TextType::class)
            ->add('contexte', TextType::class)
            ->add('annee', DateType::class,  [
                'widget' => 'choice',
                'years' => range(date('Y')-7, date('Y')+7)
            ])
            ->add('nbParticipants', NumberType::class)
            ->add('image', ImageType::class, ['required' => false])
            ->add('description', 'sonata_simple_formatter_type',  [
                'format' => 'richhtml',
            ])
            ->add('tags', EntityType::class, [
                'class' => 'RmPortfolioBundle:Tag',
                'label' => 'Tags',
                'multiple' => true
            ])
            ->add('url', UrlType::class, [
                'required' => false
            ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nom')
            ->add('contexte')
            ->add('annee')
            ->add('nbParticipants')
            ->add('description')
            ->add('url');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nom')
            ->addIdentifier('contexte')
            ->addIdentifier('annee')
            ->addIdentifier('nbParticipants')
            ->addIdentifier('description')
            ->addIdentifier('url');
    }
}