<?php
/**
 * Created by PhpStorm.
 * User: remim
 * Date: 05/01/2018
 * Time: 17:08
 */

namespace Rm\PortfolioBundle\DataFixtures\ORM;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Rm\PortfolioBundle\Entity\Diplome;

class LoadDiplome extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $titres = [
            "Baccalauréat Scientifique",
            "BTS Audiovisuel",
            "Expert informatiques et systèmes d'informations"
        ];
        $specialites = [
            "Option Sciences et vie de la Terre",
            "Option métiers du son",
            "Développement"
        ];
        $ecoles = [
            "Lycée du Mirail",
            "Adams 3iS",
            "Ingésup"
        ];
        $lieux = [
            "Bordeaux",
            "Bègles",
            "Bordeaux"
        ];
        $startDates = [
            new \DateTime("01-09-2010"),
            new \DateTime("01-09-2013"),
            new \DateTime("01-09-2016")
        ];
        $endDates = [
            new \DateTime("01-07-2013"),
            new \DateTime("01-07-2015"),
            new \DateTime("01-09-2021")
        ];
        $obtention = [
            true,
            true,
            false
        ];

        for ($i = 0; $i < 3; $i++) {
            $diplome = new Diplome();
            $diplome->setTitre($titres[$i])
                ->setSpecialite($specialites[$i])
                ->setEcole($ecoles[$i])
                ->setLieu($lieux[$i])
                ->setStartDate($startDates[$i])
                ->setEndDate($endDates[$i])
                ->setObtention($obtention[$i]);

            $manager->persist($diplome);
        }

        $manager->flush();
    }
}