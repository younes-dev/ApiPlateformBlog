<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encode;

    public function __construct(UserPasswordEncoderInterface $encode)
    {
        $this->encode = $encode;
    }

    public function load(ObjectManager $manager): void
    {
        $faker= Factory::create();
        for ($loop = 1; $loop <= 10; $loop++) {
            $user= new User();
            $passHash=$this->encode->encodePassword($user, 'pass');
            $user->setEmail($faker->email)
                ->setPassword($passHash);
            $manager->persist($user);

            $random=random_int(3, 6);
            for ($i = 0; $i < $random; $i++) {
                $article = (new Article())->setAuthor($user)
                    ->setContent($faker->text(300))
                    ->setName($faker->name())
                ;
                $manager->persist($article);
            }
        }

        $manager->flush();
    }
}