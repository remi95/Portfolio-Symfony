<?php
/**
 * Created by PhpStorm.
 * User: remim
 * Date: 06/01/2018
 * Time: 12:25
 */

namespace Rm\MainBundle\DataFixtures\ORM;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Rm\MainBundle\Entity\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class LoadImage extends Fixture
{
    public function load(ObjectManager $manager)
    {
//        $files = [
//            new UploadedFile('web/assets/img/fixtures/aa.jpeg', 'aa.jpeg'),
//            new UploadedFile('web/assets/img/fixtures/zz.jpeg', 'zz.jpeg'),
//            new UploadedFile('web/assets/img/fixtures/ee.png', 'ee.png'),
//            new UploadedFile('web/assets/img/fixtures/rr.jpeg', 'rr.jpeg'),
//            new UploadedFile('web/assets/img/fixtures/tt.jpeg', 'tt.jpeg'),
//            new UploadedFile('web/assets/img/fixtures/yy.jpeg', 'yy.jpeg'),
//            new UploadedFile('web/assets/img/fixtures/uu.jpeg', 'uu.jpeg'),
//            new UploadedFile('web/assets/img/fixtures/ii.jpeg', 'ii.jpeg'),
//            new UploadedFile('web/assets/img/fixtures/oo.jpeg', 'oo.jpeg'),
//            new UploadedFile('web/assets/img/fixtures/pp.jpeg', 'pp.jpeg'),
//        ];
//
//        for ($i = 0; $i < 10; $i++) {
//            $image = new Image();
//            $image->setFile($files[$i]);
//
//            $manager->persist($image);
//            $this->addReference('img-'.$i, $image);
//        }
//
//        $manager->flush();
    }
}