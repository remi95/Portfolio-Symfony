<?php
/**
 * Created by PhpStorm.
 * User: remim
 * Date: 02/01/2018
 * Time: 16:08
 */

namespace Rm\MainBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('avatar', ImageType::class, ['required' => false]);
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getBlockPrefix()
    {
        return 'rm_user_profile';
    }

}