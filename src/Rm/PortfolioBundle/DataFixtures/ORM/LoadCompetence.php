<?php
/**
 * Created by PhpStorm.
 * User: remim
 * Date: 05/01/2018
 * Time: 16:59
 */

namespace Rm\PortfolioBundle\DataFixtures\ORM;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Rm\PortfolioBundle\Entity\Competence;

class LoadCompetence extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $competences = [
            "Html",
            "Css",
            "Javascript",
            "Php",
            "Sql",
            "Java"
        ];
        $pourcentages = [
            "95",
            "85",
            "70",
            "65",
            "80",
            "60"
        ];

        for ($i = 0; $i < 6; $i++) {
            $competence = new Competence();
            $competence->setNom($competences[$i])
                        ->setPourcentage($pourcentages[$i]);

            $manager->persist($competence);
        }

        $manager->flush();
    }
}