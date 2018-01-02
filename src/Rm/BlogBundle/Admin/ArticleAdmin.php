<?php
/**
 * Created by PhpStorm.
 * User: remim
 * Date: 22/12/2017
 * Time: 09:42
 */

namespace Rm\BlogBundle\Admin;

use Rm\MainBundle\Form\ImageType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticleAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('titre', TextType::class)
            ->add('categorie', EntityType::class, [
                'class' => 'RmBlogBundle:Categorie',
                'label' => 'Catégorie'
            ])
            ->add('image', ImageType::class)
            ->add('contenu', 'sonata_simple_formatter_type',  [
                'format' => 'richhtml',
            ]);

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('titre')
            ->add('contenu')
            ->add('publishDate')
            ->add('editDate')
            ->add('categorie');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('titre')
            ->addIdentifier('contenu')
            ->addIdentifier('publishDate')
            ->addIdentifier('editDate')
            ->addIdentifier('categorie');
    }
}