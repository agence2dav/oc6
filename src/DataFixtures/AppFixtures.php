<?php

declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Service\FixturesService;
use App\Entity\Comment;
use App\Entity\Media;
use App\Entity\MediaType;
use App\Entity\Trick;
use App\Entity\User;
use App\Entity\Cat;
use App\Entity\Tag;
use App\Entity\TrickTags;
//use Bar\UserInterface;
use Faker;

class AppFixtures extends Fixture
{

    private array $objects = [];
    private int $numberOfTricks = 10;

    public function __construct(
        private readonly FixturesService $fixturesService,
        private readonly UserPasswordHasherInterface $hasher,
        private readonly SluggerInterface $slugger,
    ) {
    }

    public function tags(ObjectManager $manager): void
    {
        foreach ($this->fixturesService->tags() as $key => $categories) {
            foreach ($categories as $category => $tags) {
                $cat = new Cat();
                $cat->setName($category);
                $manager->persist($cat);
                foreach ($tags as $tagname) {
                    $tag = new Tag();
                    $tag->setName($tagname);
                    $tag->setCat($cat);
                    $this->objects['tag'][] = $tag;
                    $manager->persist($tag);
                }
            }
        }
        $manager->flush();
    }

    public function trick_tags(ObjectManager $manager): void
    {
        $nb_tags = count($this->objects['tag']) - 1;
        for ($i = 0; $i < $this->numberOfTricks; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $trickTags = new TrickTags();
                $trickTags
                    ->setTrick($this->objects['trick'][$i])
                    ->setTag($this->objects['tag'][mt_rand(0, $nb_tags)]);
                $manager->persist($trickTags);
            }
        }
        $manager->flush();
    }

    public function comments(ObjectManager $manager): void
    {
        for ($i = 0; $i < $this->numberOfTricks; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $comments = new Comment();
                $comments
                    ->setTrick($this->objects['trick'][$i])
                    ->setUser($this->objects['user'][$j])
                    ->setContent($this->fixturesService->faker->paragraphs(mt_rand(1, 3), true))
                    ->setStatus(rand(0, 1))
                    ->setDate($this->fixturesService->generateRandomDateFrom());
                $manager->persist($comments);
            }
        }
        $manager->flush();
    }

    public function tricks(ObjectManager $manager): void
    {
        for ($i = 0; $i < $this->numberOfTricks; $i++) {
            $trick = new Trick();
            $title = $this->fixturesService->faker->sentence($nbWords = 4, $variableNbWords = true);
            $slug = $this->slugger->slug($title);
            $trick
                ->setUser($this->objects['user'][$i])
                ->setTitle($title)
                ->setSlug($slug->__toString())
                ->setContent($this->fixturesService->faker->paragraphs(mt_rand(4, 7), true))
                ->setImage($this->objects['images'][$i])
                ->setCreatedAt($this->fixturesService->generateDateInPast())
                ->setUpdatedAt($this->fixturesService->generateRandomDateFrom())
                ->setStatus(1);
            $this->objects['trick'][] = $trick;
            $manager->persist($trick);
        }
        $manager->flush();
    }

    public function images(): void
    {
        $dir = getcwd() . '/public/uploads/';
        $images = scandir($dir);
        unset($images[0]);
        unset($images[1]);
        sort($images);
        $this->objects['images'] = $images;
    }

    public function avatars(): void
    {
        $dir = getcwd() . '/assets/avatars/';
        $images = scandir($dir);
        unset($images[0]);
        unset($images[1]);
        sort($images);
        $this->objects['avatars'] = $images;
    }

    public function videos(): void
    {
        $this->objects['videos'] = [
            'https://www.youtube.com/watch?v=R2Cp1RumorU',
            'https://www.youtube.com/watch?v=P-HnC7Ej9mw',
            'https://www.youtube.com/watch?v=PxhfDec8Ays',
            'https://www.youtube.com/watch?v=3GHU3DN1v4Q',
            'https://www.youtube.com/watch?v=7VBalG0IhhI',
            'https://www.youtube.com/watch?v=rxGOi2FFGLA',
            'https://www.youtube.com/watch?v=eTh9_-6gJIQ',
            'https://www.youtube.com/watch?v=8sdaseV7SEk',
            'https://www.youtube.com/watch?v=Iofrv4rxJcY',
            'https://www.youtube.com/watch?v=aPhYdeitDtA'
        ];
    }

    public function mediaTypes(ObjectManager $manager): void
    {
        foreach (['image', 'video', 'avatar', 'youtube'] as $type) {
            $mediaType = new MediaType();
            $mediaType->setType($type);
            $manager->persist($mediaType);
            $this->objects['mediaType'][] = $mediaType;
        }
        $manager->flush();
    }

    public function medias(ObjectManager $manager): void
    {
        for ($i = 0; $i < $this->numberOfTricks; $i++) {
            $media = new Media();
            $media
                ->setTrick($this->objects['trick'][$i])
                ->setFilename($this->objects['images'][$i])
                ->setType($this->objects['mediaType'][0]);
            $this->objects['media'][] = $media;
            $manager->persist($media);
            $media = new Media();
            $media
                ->setTrick($this->objects['trick'][$i])
                ->setFilename($this->objects['videos'][$i])
                ->setType($this->objects['mediaType'][3]);
            $this->objects['media'][] = $media;
            $manager->persist($media);
        }
        $manager->flush();
    }

    public function users(ObjectManager $manager): void
    {
        for ($i = 0; $i < $this->numberOfTricks; $i++) {
            $user = new User();
            $password = $this->hasher->hashPassword($user, $this->fixturesService->generalPassword());
            $user
                ->setUser($i == 0 ? $this->fixturesService->adminName() : $this->fixturesService->faker->username)
                ->setEmail($i == 0 ? $this->fixturesService->adminMAil() : $this->fixturesService->faker->email)
                ->setPassword($password)
                ->setRoles([$i == 0 ? 'ROLE_ADMIN' : 'ROLE_EDIT'])
                ->setAvatar($this->objects['avatars'][mt_rand(0, 9)]);
            $this->objects['user'][] = $user;
            $manager->persist($user);
        }
        $manager->flush();
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $this->images();
        $this->videos();
        $this->avatars();
        $this->users($manager);
        $this->tricks($manager);
        $this->mediaTypes($manager);
        $this->medias($manager);
        $this->comments($manager);
        $this->tags($manager);
        $this->trick_tags($manager);
    }
}
