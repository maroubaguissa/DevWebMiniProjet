<?php
namespace App\DataFixtures;

use App\Entity\Trajet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TrajetFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager) : void
    {
        $trajet1 = new Trajet();
        $trajet1->setUser($manager->merge($this->getReference('user')))
        ->setVilledep('Paris')
        ->setDateDep(new \DateTime('+10 days'))
        ->setHeureDep(new \DateTime('+1 hours'))
        ->setVilleA('Nantes')
        ->setHeureA(new \DateTime('+2 hours'))
        ->setNbrePlace(4)
        ->setPrice(12)
        ->setDistance(200);

        $manager->persist($trajet1);

        $trajet2 = new Trajet();
        $trajet2->setUser($manager->merge($this->getReference('user')))
        ->setVilleDep('Marseille')
        ->setDateDep(new \DateTime('+11 days'))
        ->setHeureDep(new \DateTime('+1 hours'))
        ->setVilleA('Lille')
        ->setHeureA(new \DateTime('+2 hours'))
        ->setNbrePlace(4)
        ->setPrice(15)
        ->setDistance(100);

        $manager->persist($trajet2);

        $trajet3 = new Trajet();
        $trajet3->setUser($manager->merge($this->getReference('user')))
        ->setVilleDep('Nice')
        ->setDateDep(new \DateTime('+12 days'))
        ->setHeureDep(new \DateTime('+1 hours'))
        ->setVilleA('Bordeaux')
        ->setHeureA(new \DateTime('+2 hours'))
        ->setNbrePlace(4)
        ->setPrice(20)
        ->setDistance(300);

        $manager->persist($trajet3);

        $trajet4 = new Trajet();
        $trajet4->setUser($manager->merge($this->getReference('user')))
        ->setVilleDep('Strasbourg')
        ->setDateDep(new \DateTime('+13 days'))
        ->setHeureDep(new \DateTime('+1 hours'))
        ->setVilleA('Lyon')
        ->setHeureA(new \DateTime('+2 hours'))
        ->setNbrePlace(4)
        ->setPrice(25)
        ->setDistance(150);

        $manager->persist($trajet4);

        
        $manager->flush();
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
    
        ];
    }
}