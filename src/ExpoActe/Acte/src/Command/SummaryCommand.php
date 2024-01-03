<?php

namespace ExpoActe\Acte\Command;

use Doctrine\ORM\EntityManagerInterface;
use ExpoActe\Acte\Certificate\CertificateTypeEnum;
use ExpoActe\Acte\Entity\Summary;
use ExpoActe\Acte\Repository\SummaryRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'acte:summary',
    description: 'Mise à jour des statistiques',
)]
class SummaryCommand extends Command
{
    public function __construct(
        private readonly SummaryRepository $summaryRepository,
        private readonly EntityManagerInterface $entityManager
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('type', InputArgument::OPTIONAL, 'Type d\'acte');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $type = strtoupper($input->getArgument('type'));
        if (!$type) {
            $helper = $this->getHelper('question');
            $choices = CertificateTypeEnum::getTypes();

            $question = new ChoiceQuestion(
                'Choisissez pour quel type d\'acte vous voulez générer les statistiques',
                $choices,
                0
            );
            $question->setMaxAttempts(2);
            $question->setNormalizer('strtoupper');
            $question->setErrorMessage('Ce type de certificat est invalide.');

            $type = $helper->ask($input, $output, $question);
        }

        $certificateType = CertificateTypeEnum::from($type);
        $output->writeln('Vous avez sélectionnez: '.$certificateType->getLabel());

        $repository = $this->entityManager->getRepository($certificateType->getClassName());

        foreach ($repository->findMunicipalities() as $item) {
            $io->section($item['commune']);
            $this->removeOld($item['commune'], $certificateType->value);
            $results = $repository->statistics($certificateType->value, $item['commune']);
            foreach ($results as $result) {
                if ($result['dmax'] == 0) {
                    $io->error('Les dates de '.$item['COMMUNE'].' sont mal encodées');
                    continue;
                }
                $io->writeln($item['depart']);
                $summary = new Summary();
                $summary->commune = $item['commune'];
                $summary->depart = $item['depart'];
                $summary->typact = $certificateType->value;
                $summary->an_min = $result['dmin'];
                $summary->an_max = $result['dmax'];
                $summary->dtdepot = \DateTime::createFromFormat('Y-m-d', $result['ddepot']);
                $summary->deposant = $result['deposant'];
                $summary->nb_tot = $result['ctot'];
                $summary->nb_n_nul = $result['cnnul'];
                $summary->nb_fil = $result['cfil'];
                $summary->der_maj = new \DateTime();
                $this->summaryRepository->persist($summary);
            }
        }

        //$this->summaryRepository->flush();
        return Command::SUCCESS;
    }

    private function removeOld(string $municipality, string $certificateType): void
    {
        foreach ($this->summaryRepository->findMunicipalityAndCertificateType(
            $municipality,
            $certificateType
        ) as $summary) {
            $this->summaryRepository->remove($summary);
        }
    }
}
