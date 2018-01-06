<?php
/**
 * Created by PhpStorm.
 * User: remim
 * Date: 05/01/2018
 * Time: 16:34
 */

namespace Rm\PortfolioBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Rm\PortfolioBundle\Entity\Experience;

class LoadExperience extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $entreprises = [
            "Sympozium",
            "Leclerc Drive",
            "Shaman Studio",
            "Rocher de Palmer",
            "Tv7",
            "Médiathèque"
        ];
        $postes = [
            "Stagiaire",
            "Préparateur - Livreur",
            "Stagiaire",
            "Stagiaire",
            "Stagiaire",
            "Emploi saisonnier"
        ];
        $lieux = [
            "Bordeaux",
            "Artigues-près-Bordeaux",
            "Bordeaux",
            "Cenon",
            "Bordeaux",
            "Artigues-près-Bordeaux"
        ];
        $startDates = [
            new \DateTime('01-06-2017'),
            new \DateTime('01-01-2016'),
            new \DateTime('01-06-2014'),
            new \DateTime('01-04-2014'),
            new \DateTime('01-02-2014'),
            new \DateTime('01-07-2013')
        ];
        $endDates = [
            new \DateTime('01-07-2017'),
            new \DateTime('01-08-2016'),
            new \DateTime('01-07-2014'),
            new \DateTime('01-04-2014'),
            new \DateTime('01-02-2014'),
            new \DateTime('01-07-2013')
        ];
        $description = "<p>Atque, ut Tullius ait <br>
                         ut etiam ferae fame monitae plerumque <br>
                         ad eum locum ubi aliquando pastae sunt revertuntur</p>";
        $urls = [
            "http://www.sympozium.fr",
            "http://www.leclercdrive.fr",
            "http://www.shamanstudio.com",
            "http://www.lerocherdepalmer.fr",
            "http://www.tv7.fr",
            "http://www.mediatheque-artigues.com/opacwebaloes/index.aspx",
        ];

        for ($i = 0; $i < 6; $i++) {
            $experience = new Experience();
            $experience->setDescription($description)
                        ->setEntreprise($entreprises[$i])
                        ->setPoste($postes[$i])
                        ->setLieu($lieux[$i])
                        ->setStartDate($startDates[$i])
                        ->setEndDate($endDates[$i])
                        ->setUrl($urls[$i]);

            $manager->persist($experience);
        }

        $manager->flush();
    }
}