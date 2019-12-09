<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $em)
    {
        $ajout = new User();
        $ajout->setEmail('test@gmail.com')
            ->setUsername('test')
            ->setPassword('test1312');
        $em = $this->getDoctrine()->getManager();
        $em->persist($ajout);
        $em->flush();
    }
}
