<?php
/**
 * Created by PhpStorm.
 * User: remim
 * Date: 05/01/2018
 * Time: 19:06
 */

namespace Rm\PortfolioBundle\DataFixtures\ORM;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Rm\PortfolioBundle\Entity\Projet;

class LoadProjet extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $noms = [
            "Abiflizera",
            "Loady",
            "Plugin météo",
            "OLibrary",
        ];
        $descriptions = [
            "<p>Dans le cadre des cours de&nbsp;<strong>SEO</strong>&nbsp;(Search Engine Optimization), tous les premi&egrave;res ann&eacute;es d&#39;Ing&eacute;sup Bordeaux doivent, par groupe, cr&eacute;er un site sur un sujet donn&eacute; et inconnu par Google. En l&#39;espace de trois mois, le site le mieux r&eacute;f&eacute;renc&eacute; sera gagnant !<br />
                Ici, le th&egrave;me est une pillule, du nom d&#39;<strong>Abiflizera</strong>, qui permettrait d&#39;augmenter ses capacit&eacute;s intellectuelles, &agrave; l&#39;instar du&nbsp;<em>NZT</em>&nbsp;dans le film&nbsp;<em>Limitless</em>.</p>
                <p>Nous avons choisi d&#39;utiliser un Wordpress pour ne pas perdre de temps sur tout l&#39;aspect du d&eacute;veloppement.</p>
                <p>Visitez notre page !</p>",
            "<p>Dans le cadre du labo &#39;Mobilit&eacute;&#39;, un mercredi sur deux durant l&#39;ann&eacute;e, j&#39;ai travaill&eacute; sur les technologies permettant de d&eacute;velopper une application mobile. Apr&egrave;s avoir apprivois&eacute; le langage web (HTML, CSS et Javascript), je suis pass&eacute; sur Ionic afin de d&eacute;velopper une application hybride. J&#39;ai d&eacute;cid&eacute; de cr&eacute;er deux petits jeux tr&egrave;s simples, afin de me concentrer sur la technologie Ionic qui m&#39;&eacute;tait alors inconnue.</p>
                <p>Dans le premier jeu, une jauge se rempli al&eacute;atoirement entre 0 et 100%, et il faut deviner ce pourcentage. Plus on s&#39;approche du bon r&eacute;sultat, et plus on gagne de points.&nbsp;<br />
                Dans le deuxi&egrave;me, 2 joueurs s&#39;affrontent. En restant appuy&eacute;, une jauge avance avec une vitesse al&eacute;atoire pour chaque joueur. Celui qui se rapproche du but, lui aussi al&eacute;atoire &agrave; chaque partie, &agrave; gagn&eacute;.</p>",
            "<p>Dans le cadre des cours de Javascript, nous devons cr&eacute;er un plugin, &agrave; l&#39;aide de Jquery. Celui-ci doit utiliser une API m&eacute;t&eacute;o afin de r&eacute;cup&eacute;rer les donn&eacute;es en temps r&eacute;el et les retransmettre selon nos besoins.</p>",
            "<p>Ce projet a &eacute;t&eacute; lanc&eacute; en d&eacute;but de premi&egrave;re ann&eacute;e et s&#39;arr&ecirc;tera &agrave; sa fin. Il demande en effet des comp&eacute;tences que l&#39;on acquiert tout au long de la premi&egrave;re ann&eacute;e. Le but est de cr&eacute;er pour un biblioth&egrave;que, un OPAC (Online Public Access Catalogue) et un son SIGB (Syst&egrave;me int&eacute;gr&eacute; de Gestion de Biblioth&egrave;que). Le tout doit &ecirc;tre accessible depuis un navigateur web.</p>
                <p>Dans un premier temps, il a fallu r&eacute;pondre &agrave; l&#39;appel d&#39;offre. Apr&egrave;s quoi il fallait mod&eacute;liser la base de donn&eacute;es, la cr&eacute;er, puis r&eacute;aliser les maquettes des diff&eacute;rentes parties du site.</p>",
        ];
        $urls = [
            "http://limitless-abiflizera.com/",
            null,
            null,
            null,
        ];
        $contextes = [
            "Projet scolaire",
            "Projet scolaire",
            "Projet scolaire",
            "Projet scolaire - Fil rouge"
        ];
        $annees = [
            new \DateTime('01-03-2017'),
            new \DateTime('01-04-2017'),
            new \DateTime('01-03-2017'),
            new \DateTime('01-05-2017'),
        ];
        $nbParticipants = [
            3,
            1,
            2,
            5
        ];

        $tagsIds = [
            [1, 2],
            [3, 4, 5, 6],
            [4],
            [4, 5, 6, 7, 8, 9]
        ];

        for ($i = 0; $i < 4; $i++) {
            $projet = new Projet();
            $projet->setNom($noms[$i])
                ->setDescription($descriptions[$i])
                ->setUrl($urls[$i])
                ->setContexte($contextes[$i])
                ->setAnnee($annees[$i])
                ->setNbParticipants($nbParticipants[$i]);

            foreach($tagsIds[$i] as $tag){
                $projet->addTag($this->getReference('tag-'.$tag));
            }
            $manager->persist($projet);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            LoadTag::class,
        );
    }
}