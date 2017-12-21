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
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class ExperienceAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('entreprise', TextType::class)
            ->add('poste', TextType::class)
            ->add('lieu', TextType::class)
            ->add('startDate', DateType::class, [
                'widget' => 'choice',
                'years' => range(date('Y')-20, date('Y')+20)
            ])
            ->add('endDate', DateType::class, [
                'widget' => 'choice',
                'years' => range(date('Y')-20, date('Y')+20)
            ])
            ->add('description', 'sonata_simple_formatter_type',  [
                'format' => 'richhtml',
            ])
            ->add('url', UrlType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('entreprise')
            ->add('poste')
            ->add('lieu')
            ->add('startDate')
            ->add('endDate')
            ->add('description')
            ->add('url');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('entreprise')
            ->addIdentifier('poste')
            ->addIdentifier('lieu')
            ->addIdentifier('startDate')
            ->addIdentifier('endDate')
            ->addIdentifier('description')
            ->addIdentifier('url');
    }
}