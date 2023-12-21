<?php

namespace ExpoActe\Acte\Controller;

use ExpoActe\Acte\Entity\Metadb;
use ExpoActe\Acte\Repository\MetaDbRepository;
use ExpoActe\Acte\Repository\MetaGroupLabelRepository;
use ExpoActe\Acte\Repository\MetaLabelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/label')]
class LabelController extends AbstractController
{
    public function __construct(
        private readonly MetaGroupLabelRepository $metaGroupLabelRepository,
        private readonly MetaLabelRepository $metaLabelRepository,
        private readonly MetaDbRepository $metaDbRepository
    ) {

    }

    #[Route(path: '/{table}', name: 'expoacte_label_index')]
    public function index(string $table = 'N'): Response
    {
        $metas = $this->metaDbRepository->findByTable($table);
        foreach ($metas as $meta) {
            $meta->label = $this->metaLabelRepository->findOneByZid($meta->zid);
        }

        $grps = array_map(function (Metadb $meta) {
            return $meta->groupe;
        }, $metas);

        $groupes = $this->metaGroupLabelRepository->findByTableAndGrps($table, array_values(array_unique($grps)));

        foreach ($groupes as $group) {
            $group->metas = $this->metaDbRepository->findByTableAndGroup($table, $group->grp);
            foreach ($group->metas as $meta) {
                $meta->label = $this->metaLabelRepository->findOneByZid($meta->zid);
            }
        }

        return $this->render(
            '@ExpoActe/label/index.html.twig',
            [
                'groupes' => $groupes,
            ]
        );
    }

    #[Route(path: '/draft/{table}', name: 'expoacte_label_draft')]
    public function draft(string $table = 'N'): Response
    {
        $metas = $this->metaDbRepository->findByTable($table);
        $groupes = $this->metaGroupLabelRepository->findByTable($table);
        $mgrplgs = $this->metaGroupLabelRepository->findAllOrdered();
        $metasLg = $this->metaLabelRepository->findAllOrdered();
        foreach ($metasLg as $label) {
            $label->meta = $this->metaDbRepository->findOneByZid($label->zid);
        }

        return $this->render(
            '@ExpoActe/label/draft.html.twig',
            [
                'groupes' => $groupes,
                'mgrplgs' => $mgrplgs,
                'metasLg' => $metasLg,
                'metas' => $metas,
            ]
        );
    }
}