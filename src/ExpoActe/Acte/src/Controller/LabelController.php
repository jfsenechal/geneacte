<?php

namespace ExpoActe\Acte\Controller;

use ExpoActe\Acte\Certificate\CertificateTypeEnum;
use ExpoActe\Acte\Label\Form\LabelType;
use ExpoActe\Acte\Label\Handler\LabelHandler;
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
        private readonly LabelHandler $labelHandler
    ) {

    }

    #[Route(path: '/', name: 'expoacte_label_index')]
    public function index(): Response
    {
        $groups = CertificateTypeEnum::cases();

        return $this->render(
            '@ExpoActe/label/index.html.twig',
            [
                'groups' => $groups,
            ]
        );
    }

    #[Route(path: '/{type}/show', name: 'expoacte_label_show')]
    public function show(Request $request, CertificateTypeEnum $type = CertificateTypeEnum::BIRTH): Response
    {
        $metas = $this->metaDbRepository->findByCertificateType($type->value);
        $data = LabelUtils::groupAll($metas);
        $labelGroups = $this->metaGroupLabelRepository->findByCertificateType($type->value);

        return $this->render(
            '@ExpoActe/label/show.html.twig',
            [
                'typeSelected' => $type,
                'labelGroups' => $labelGroups,
                'data' => $data,
            ]
        );
    }

    #[Route(path: '/{type}/edit', name: 'expoacte_label_edit')]
    public function edit(Request $request, CertificateTypeEnum $type = CertificateTypeEnum::BIRTH): Response
    {
        $metas = $this->metaDbRepository->findByCertificateType($type->value);

        $metasLabel = [];
        foreach ($metas as $meta) {
            if (trim($meta->affich) == "") {
                $meta->affich = LabelDocumentEnum::NOT_EMPTY->value;
            }
            $meta->metaLabel->documentEnum = LabelDocumentEnum::from($meta->affich);
            $meta->metaLabel->metaDb = $meta;
            $meta->metaLabel->metaGroupLabel = $this->metaGroupLabelRepository->findByCertificateTypeAndGrp(
                $type->value,
                $meta->groupe
            );
            $metasLabel[] = $meta->metaLabel;
        }

        $labelDto = new LabelDto($type, $metasLabel);

        $form = $this->createForm(LabelType::class, $labelDto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->labelHandler->treatmentEdit($form->getData());
            $this->addFlash('success', 'Les étiquettes ont bien été modifiées');

            return $this->redirectToRoute('expoacte_label_edit', ['type' => $type->value]);
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