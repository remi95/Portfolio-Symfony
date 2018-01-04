<?php
/**
 * Created by PhpStorm.
 * User: remim
 * Date: 04/01/2018
 * Time: 17:09
 */

namespace Rm\BlogBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CommentaireAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('contenu')
            ->add('signalement');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('contenu')
            ->add('date')
            ->add('signalement')
            ->add('article')
            ->add('auteur');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('auteur')
            ->add('date')
            ->add('article')
            ->addIdentifier('contenu')
            ->add('signalement');
    }

    /**
     * Default Datagrid values
     *
     * @var array
     */
    protected $datagridValues = array(
        '_page' => 1,            // display the first page (default = 1)
        '_sort_order' => 'DESC', // reverse order (default = 'ASC')
        '_sort_by' => 'signalement'  // name of the ordered field
    );

}