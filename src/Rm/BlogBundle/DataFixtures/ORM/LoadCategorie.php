<?php
/**
 * Created by PhpStorm.
 * User: remim
 * Date: 05/01/2018
 * Time: 19:20
 */

namespace Rm\BlogBundle\DataFixtures\ORM;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Rm\BlogBundle\Entity\Categorie;

class LoadCategorie extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $noms = [
            "Web",
            "Jeux vidéos",
            "Programmation",
            "Logiciel",
        ];

        for ($i = 0; $i < 4; $i++) {
            $categorie = new Categorie();
            $categorie->setNom($noms[$i]);

            $manager->persist($categorie);
            $this->addReference('cat-'.($i+1), $categorie);
        }

        $manager->flush();
    }
}