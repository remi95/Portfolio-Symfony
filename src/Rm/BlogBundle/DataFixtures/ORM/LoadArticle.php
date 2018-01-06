<?php
/**
 * Created by PhpStorm.
 * User: remim
 * Date: 05/01/2018
 * Time: 19:23
 */

namespace Rm\BlogBundle\DataFixtures\ORM;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Rm\BlogBundle\Entity\Article;
use Rm\MainBundle\DataFixtures\ORM\LoadImage;
use Symfony\Component\Validator\Constraints\DateTime;

class LoadArticle extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $categorieIds = [
            1, 3, 2, 3, 1, 2, 4
        ];
        $titres = [
            "Réaliser un portfolio avec Symfony",
            "Faire un jeu sur Android",
            "The Witcher 3 ",
            "Le Java c'est rigolo",
            "Installer un serveur web sous Debian",
            "Worms",
            "Photoshop"
        ];
        $contenu = "
        <p>
            Atque, ut Tullius ait, ut etiam ferae fame monitae plerumque ad eum locum ubi aliquando pastae sunt revertuntur, ita homines instar turbinis degressi montibus impeditis et arduis loca petivere mari confinia, per quae viis latebrosis sese convallibusque occultantes cum appeterent noctes luna etiam tum cornuta ideoque nondum solido splendore fulgente nauticos observabant quos cum in somnum sentirent effusos per ancoralia, quadrupedo gradu repentes seseque suspensis passibus iniectantes in scaphas eisdem sensim nihil opinantibus adsistebant et incendente aviditate saevitiam ne cedentium quidem ulli parcendo obtruncatis omnibus merces opimas velut viles nullis repugnantibus avertebant. haecque non diu sunt perpetrata.
        </p>
        <p>
            Quod opera consulta cogitabatur astute, ut hoc insidiarum genere Galli periret avunculus, ne eum ut praepotens acueret in fiduciam exitiosa coeptantem. verum navata est opera diligens hocque dilato Eusebius praepositus cubiculi missus est Cabillona aurum secum perferens, quo per turbulentos seditionum concitores occultius distributo et tumor consenuit militum et salus est in tuto locata praefecti. deinde cibo abunde perlato castra die praedicto sunt mota.
        </p>
        <p>
            Nec minus feminae quoque calamitatum participes fuere similium. nam ex hoc quoque sexu peremptae sunt originis altae conplures, adulteriorum flagitiis obnoxiae vel stuprorum. inter quas notiores fuere Claritas et Flaviana, quarum altera cum duceretur ad mortem, indumento, quo vestita erat, abrepto, ne velemen quidem secreto membrorum sufficiens retinere permissa est. ideoque carnifex nefas admisisse convictus inmane, vivus exustus est.
        </p>
        <p>
            Dum haec in oriente aguntur, Arelate hiemem agens Constantius post theatralis ludos atque circenses ambitioso editos apparatu diem sextum idus Octobres, qui imperii eius annum tricensimum terminabat, insolentiae pondera gravius librans, siquid dubium deferebatur aut falsum, pro liquido accipiens et conperto, inter alia excarnificatum Gerontium Magnentianae comitem partis exulari maerore multavit.
        </p>
        <p>
            Eodem tempore Serenianus ex duce, cuius ignavia populatam in Phoenice Celsen ante rettulimus, pulsatae maiestatis imperii reus iure postulatus ac lege, incertum qua potuit suffragatione absolvi, aperte convictus familiarem suum cum pileo, quo caput operiebat, incantato vetitis artibus ad templum misisse fatidicum, quaeritatum expresse an ei firmum portenderetur imperium, ut cupiebat, et cunctum.
        </p>
        <p>
            Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.
        </p>";

        $publishDates = [
            new \DateTime("22-12-2017"),
            new \DateTime("10-12-2017"),
            new \DateTime("26-12-2017"),
            new \DateTime("30-12-2017"),
            new \DateTime("27-12-2017"),
            new \DateTime("22-12-2017"),
            new \DateTime("15-12-2017")
        ];
        $editDate = null;
        $imageIds = [
            2, 3, 1, 4, 8, 9, 10
        ];

        for ($i = 0; $i < 7; $i++) {
            $article = new Article();
            $article->setCategorie($this->getReference('cat-'.$categorieIds[$i]))
                ->setTitre($titres[$i])
                ->setContenu($contenu)
                ->setPublishDate($publishDates[$i])
                ->setEditDate($editDate);
//                ->setImage($this->getReference('img-'.$imageIds[$i]));
            $manager->persist($article);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            LoadCategorie::class,
            LoadImage::class
        );
    }
}