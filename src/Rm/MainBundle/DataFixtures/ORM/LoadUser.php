<?php
/**
 * Created by PhpStorm.
 * User: remim
 * Date: 06/01/2018
 * Time: 15:21
 */

namespace Rm\MainBundle\DataFixtures\ORM;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Rm\MainBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class LoadUser extends Fixture implements ContainerAwareInterface
{

    protected $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $usernames = [
            "User",
            "Toto"
        ];
        $emails = [
            "user@ynov.com",
            "toto@ynov.com"
        ];

        $admin = new User();
        $encoder = $this->container->get('security.password_encoder');
        $encodedPass = $encoder->encodePassword($admin, 'azerty');
        $admin->setUsername('Admin')
            ->setEmail('admin@ynov.com')
            ->setPassword($encodedPass)
            ->addRole('ROLE_ADMIN')
            ->setEnabled(true);
        $manager->persist($admin);

        for ($i = 0; $i < 2; $i++) {
            $user = new User();
            $encoder = $this->container->get('security.password_encoder');
            $encodedPass = $encoder->encodePassword($user, 'azerty');
            $user->setUsername($usernames[$i])
                ->setEmail($emails[$i])
                ->setPassword($encodedPass)
                ->setEnabled(true);


            $manager->persist($user);
        }

        $manager->flush();
    }
}