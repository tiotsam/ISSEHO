<?php

namespace App\DataFixtures;

use App\Entity\Matieres;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MatièresFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $matières = array('Mathématiques','Français','Echec','Anglais','Informatique','Physique','Chimie');
        $images = array('https://www.rts.ch/2020/08/11/16/11/9081328.image?w=1920&h=598','https://www.letudiant.fr/static/uploads/mediatheque/ETU_ETU/4/9/2295249-adobestock-227810706-1-766x438.jpg','https://cdn.radiofrance.fr/s3/cruiser-production/2018/11/6c62faa0-769a-4b11-9ef1-8474eddf8aee/1136_gettyimages-1030832300.webp','https://www.courslangues.com/sites/default/files/ang_monde_bandeau.jpg','https://www.studyrama.com/local/cache-gd2/d4/50c83e92625d2f501f7600f6275aef.jpg?1607617553','https://cdn.radiofrance.fr/s3/cruiser-production/2019/10/1c0f49fe-a8a1-470d-a292-fcf1fcddd305/870x489_s_physique_quantique.webp','https://fr.unesco.org/sites/default/files/styles/img_688x358/public/courier/photos/gettyimages-874157664.jpg?itok=UcRccWOp');

        foreach ($matières as $key => $matière) {
            $mat = new Matieres;
            $mat->setNom($matière);
            $mat->setImage($images[$key]);
            $manager->persist($mat);
        }

        $manager->flush();
    }
}
