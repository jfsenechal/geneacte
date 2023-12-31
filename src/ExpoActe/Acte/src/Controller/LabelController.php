<?php

namespace ExpoActe\Acte\Controller;

use ExpoActe\Acte\Certificate\CertificateTypeEnum;
use ExpoActe\Acte\Entity\MetaGroupLabel;
use ExpoActe\Acte\Label\Form\LabelType;
use ExpoActe\Acte\Label\Form\MetaGroupLabelType;
use ExpoActe\Acte\Label\Handler\LabelHandler;
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

        $metasLabel = LabelUtils::extractMetasLabel($metas);

        $labelDto = new LabelDto($type, $metasLabel);
        $labelGroups = $this->metaGroupLabelRepository->findByCertificateType($type->value);

        $form = $this->createForm(LabelType::class, $labelDto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->labelHandler->treatmentEdit($form->getData());
            $this->addFlash('success', 'Les étiquettes ont bien été modifiées');

            return $this->redirectToRoute('expoacte_label_edit', [
                'type' => $type->value,
            ]);
        }

        foreach ($labelGroups as $labelGroup) {
            foreach ($form->get('metasLabel') as $field) {
                if ($labelGroup->grp === $field->getData()->metaDb->groupe) {
                    $labelGroup->fields[] = $field;
                }
            }
        }

        return $this->render(
            '@ExpoActe/label/edit.html.twig',
            [
                'typeSelected' => $type,
                'labelGroups' => $labelGroups,
                'form' => $form,
            ]
        );
    }

    #[Route(path: '/{id}/group/edit', name: 'expoacte_label_group_edit')]
    public function editGroup(Request $request, MetaGroupLabel $metaGroupLabel): Response
    {
        $form = $this->createForm(MetaGroupLabelType::class, $metaGroupLabel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->metaGroupLabelRepository->flush();
            $this->addFlash('success', 'Les étiquettes ont bien été modifiées');

            return $this->redirectToRoute('expoacte_label_edit', [
                'type' => $metaGroupLabel->dtable,
            ]);
        }

        return $this->render(
            '@ExpoActe/label/edit_group.html.twig',
            [
                'metaGroupLabel' => $metaGroupLabel,
                'form' => $form,
            ]
        );
    }
}
