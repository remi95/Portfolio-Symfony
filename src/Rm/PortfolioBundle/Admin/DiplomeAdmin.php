<?php
/**
 * Created by PhpStorm.
 * User: remim
 * Date: 04/12/2017
 * Time: 12:02
 */

namespace Rm\PortfolioBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DiplomeAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('titre', TextType::class)
            ->add('specialite', TextType::class)
            ->add('ecole', TextType::class)
            ->add('lieu', TextType::class)
            ->add('startDate', DateType::class, [
                'widget' => 'choice',
                'years' => range(date('Y')-20, date('Y')+20)
            ])
            ->add('endDate', DateType::class, [
                'widget' => 'choice',
                'years' => range(date('Y')-20, date('Y')+20)
            ])
            ->add('obtention', CheckboxType::class, [
                'required' => false
            ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('titre')
            ->add('specialite')
            ->add('ecole')
            ->add('lieu')
            ->add('startDate')
            ->add('endDate')
            ->add('obtention');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('titre')
            ->addIdentifier('specialite')
            ->addIdentifier('ecole')
            ->addIdentifier('lieu')
            ->addIdentifier('startDate')
            ->addIdentifier('endDate')
            ->addIdentifier('obtention');
    }
}