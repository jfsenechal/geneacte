<?php

namespace ExpoActe\Acte\Command;

use Doctrine\ORM\EntityManagerInterface;
use ExpoActe\Acte\Certificate\CertificateTypeEnum;
use ExpoActe\Acte\Repository\SummaryRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
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

        try {

            $certificateType = CertificateTypeEnum::from($type);
        } catch (\Exception $exception) {

            $io->error('Ce type de certificat n\'est pas supporté');

            return Command::FAILURE;
        }

        $repository = $this->entityManager->getRepository($certificateType->getClassName());

        foreach ($repository->findMunicipalities() as $item) {
            $io->writeln($item['commune']);
        }


        return Command::SUCCESS;
    }
}
