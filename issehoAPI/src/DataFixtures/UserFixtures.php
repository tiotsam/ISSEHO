<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $admin = new User;
        $admin->setEmail('contact@isseho.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->userPasswordHasher->hashPassword($admin,plainPassword:'isseho123'));
        $manager->persist($admin);

        
        for ($i=0; $i<10; $i++) {
            $prof = new User;
        $prof->setEmail('prof'.$i.'@gmail.com');
        $prof->setRoles(['ROLE_USER','ROLE_PROF']);
        $prof->setPassword($this->userPasswordHasher->hashPassword($prof,plainPassword:'prof123'.$i));
        $manager->persist($prof);

        $parent = new User;
        $parent->setEmail('parent'.$i.'@gmail.com');
        $parent->setRoles(['ROLE_USER','ROLE_PARENT']);
        $parent->setPassword($this->userPasswordHasher->hashPassword($prof,plainPassword:'parent123'.$i));
        $manager->persist($parent);

        $enfant = new User;
        $enfant->setEmail('enfant'.$i.'@gmail.com');
        $enfant->setRoles(['ROLE_USER','ROLE_ENFANT']);
        $enfant->setPassword($this->userPasswordHasher->hashPassword($prof,plainPassword:'enfant123'.$i));
        $manager->persist($enfant);

        }

        

        $manager->flush();
    }
}
