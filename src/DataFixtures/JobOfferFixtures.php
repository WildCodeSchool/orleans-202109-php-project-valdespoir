<?php

namespace App\DataFixtures;

use App\Entity\JobOffer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class JobOfferFixtures extends Fixture implements DependentFixtureInterface
{
    const JOBOFFER = [
        [
            'title' => 'Offre 1',
            'description' => 'Emplacement géographique : Sandillon<br>
            Tâches à effectuer : tailler des arbres et tondre la pelouse.<br>
            Horaires : 7h-16h<br>
            Offre disponible : dès aujourd\'hui.<br>
            Contact : 00 00 00 00 00 ou test@valespoir.fr<br>");'
        ],

        [
            'title' => 'Offre 2',
            'description' => 'Emplacement géographique : Sandillon<br>
            Tâches à effectuer : tailler des arbres et tondre la pelouse.<br>
            Horaires : 7h-16h<br>
            Offre disponible : dès aujourd\'hui.<br>
            Contact : 00 00 00 00 00 ou test@valespoir.fr<br>");'
        ],

        [
            'title' => 'Offre 3',
            'description' => 'Emplacement géographique : Sandillon<br>
            Tâches à effectuer : tailler des arbres et tondre la pelouse.<br>
            Horaires : 7h-16h<br>
            Offre disponible : dès aujourd\'hui.<br>
            Contact : 00 00 00 00 00 ou test@valespoir.fr<br>");'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::JOBOFFER as $key => $jobOfferTitle) {
            $jobOffer = new JobOffer();
            $jobOffer->setTitle($jobOfferTitle['title']);
            $jobOffer->setDescription($jobOfferTitle['description']);
            $manager->persist($jobOfferTitle);
            $this->addReference('job_' . $key, $jobOfferTitle);

        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProgramFixtures::class
        ];
    }
}
