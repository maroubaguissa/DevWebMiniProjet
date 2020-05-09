<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;


class UserFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new Users();
        $user->setEmail("user@user.fr");
        $user->setNom("user");
        $user->setPrenom("user");
        $user->setTelephone("12345678");
        $user->setAdresse("123 rue test");
        $user->setVille("testville");
        $user->setcp("44300");
        $user->setPassword("user");
        $manager->persist($user);

        $admin = new Users();
        $admin->setEmail("admin@admin.fr");
        $admin->setNom("user");
        $admin->setPrenom("user");
        $admin->setTelephone("12345678");
        $admin->setAdresse("123 rue test");
        $admin->setVille("testville");
        $admin->setCp("44300");
        $admin->setPassword("admin");
        $manager->persist($admin);

        $manager->flush();

        $this->addReference('admin', $admin);
        $this->addReference('user', $user);

    }
}