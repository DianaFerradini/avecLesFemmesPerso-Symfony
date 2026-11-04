<?php

namespace App\DataFixtures;

use App\Entity\Exercice;
use App\Enum\StatutExercice;
use App\Repository\GroupementRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ExerciceFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(private readonly GroupementRepository $repo) {

    }

    public function getDependencies(): array {
        return [GroupementFixtures::class];
    }

    public function load(ObjectManager $manager): void
    {
        $data = [
            // nom du groupement, début, fin, limite des prêts, rétribution, statut

            // Groupement 1 : un exercice clôturé + un en cours qui finit dans environ 2 mois
            ['GIE Teranga Mbour', '-13 months', '-1 month -1 day', '-7 months', '-2 weeks', StatutExercice::CLOTURE],
            ['GIE Teranga Mbour', '-1 month', '+2 months', '+1 month', '+10 weeks', StatutExercice::ENCOURS],

            // Groupement 2 : en cours, mais la fin est passée depuis 5 jours (cas « 0 jour »)
            ['GIE Jappo Dakar', '-1 year', '-5 days', '-2 months', '+10 days', StatutExercice::ENCOURS],

            // Groupement 3 : en cours, sans date de fin (cas « null »)
            ['GIE Dëgg Saint-Louis', '-3 months', null, '+1 month', null, StatutExercice::ENCOURS],

            // Groupement 4 (GIE Bokk Ziguinchor) : volontairement aucun exercice
        ];

        foreach ($data as [$nomGroupement, $debut, $fin, $limitePrets, $retribution, $statut]) {
            $groupement = $this->repo->findOneBy(['nom' => $nomGroupement]);
            $exercice = (new Exercice())
                        ->setGroupement($groupement)
                        ->setDebutAt(new \DateTime($debut))
                        ->setFinAt($fin !== null ? new \DateTime($fin) : null)
                        ->setLimitePretsAt($limitePrets !== null ? new \DateTime($limitePrets) : null)
                        ->setRetributionAt($retribution !== null ? new \DateTime($retribution) : null)
                        ->setStatut($statut);
            $manager->persist($exercice);
        }

        $manager->flush();
    }
}
