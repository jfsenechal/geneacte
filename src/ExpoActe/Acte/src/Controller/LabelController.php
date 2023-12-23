<?php

namespace ExpoActe\Acte\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use ExpoActe\Acte\Certificate\CertificateEnum;
use ExpoActe\Acte\Label\Form\LabelType;
use ExpoActe\Acte\Label\LabelDocumentEnum;
use ExpoActe\Acte\Label\LabelDto;
use ExpoActe\Acte\Label\Utils\LabelUtils;
use ExpoActe\Acte\Repository\MetaDbRepository;
use ExpoActe\Acte\Repository\MetaGroupLabelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/label')]
class LabelController extends AbstractController
{
    public function __construct(
        private readonly MetaGroupLabelRepository $metaGroupLabelRepository,
        private readonly MetaDbRepository $metaDbRepository,
    ) {

    }

    #[Route(path: '/{type}', name: 'expoacte_label_index')]
    public function index(CertificateEnum $type = CertificateEnum::BIRTH): Response
    {
        $groups = CertificateEnum::cases();
        $metas = $this->metaDbRepository->findByCertificateType($type->value);
        $data = LabelUtils::groupAll($metas);

        return $this->render(
            '@ExpoActe/label/index.html.twig',
            [
                'groups' => $groups,
                'type' => $type,
                'data' => $data,
            ]
        );
    }

    #[Route(path: '/{type}/show', name: 'expoacte_label_show')]
    public function show(Request $request, CertificateEnum $type = CertificateEnum::BIRTH): Response
    {
        $metas = $this->metaDbRepository->findByCertificateType($type->value);
        $data = LabelUtils::groupAll($metas);

        return $this->render(
            '@ExpoActe/label/show.html.twig',
            [
                'typeSelected' => $type,
                'data' => $data,
            ]
        );
    }

    #[Route(path: '/{type}/edit', name: 'expoacte_label_edit')]
    public function edit(Request $request, CertificateEnum $type = CertificateEnum::BIRTH): Response
    {
        $metas = $this->metaDbRepository->findByCertificateType($type->value);
        $labelDto = new LabelDto($type);
        $metasLabel = [];
        foreach ($metas as $meta) {
            if (trim($meta->affich) == "") {
                $meta->affich = LabelDocumentEnum::NOT_EMPTY->value;
            }
            $meta->metaLabel->documentEnum = LabelDocumentEnum::from($meta->affich);
            $meta->metaLabel->metaDb = $meta;
            $metasLabel[] = $meta->metaLabel;
        }

        $labelDto->metasLabel = new ArrayCollection($metasLabel);

        $form = $this->createForm(LabelType::class, $labelDto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

        }

        return $this->render(
            '@ExpoActe/label/edit.html.twig',
            [
                'typeSelected' => $type,
                'form' => $form,
            ]
        );
    }
}