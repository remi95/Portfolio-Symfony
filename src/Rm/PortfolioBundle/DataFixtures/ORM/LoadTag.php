<?php
/**
 * Created by PhpStorm.
 * User: remim
 * Date: 05/01/2018
 * Time: 19:18
 */

namespace Rm\PortfolioBundle\DataFixtures\ORM;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Rm\PortfolioBundle\Entity\Tag;

class LoadTag extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $noms = [
            "SEO",
            "Wordpress",
            "Ionic",
            "Jquery",
            "Html",
            "Css",
            "MySQL",
            "Bootstrap",
            "Php",
            "Symfony"
        ];

        for ($i = 0; $i < 10; $i++) {
            $tag = new Tag();
            $tag->setNom($noms[$i]);

            $manager->persist($tag);
            $this->addReference('tag-'.($i+1), $tag);
        }

        $manager->flush();
    }
}