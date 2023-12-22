<?php

namespace ExpoActe\Acte\Certificate\Factory;

use ExpoActe\Acte\Repository\MetaGroupLabelRepository;
use Symfony\Component\Form\FormInterface;
use Symfony\Contracts\Service\Attribute\Required;
use Twig\Environment;

trait RenderFormTrait
{
    private Environment $environment;
    private metaGroupLabelRepository $metaGroupLabelRepository;

    #[Required]
    public function setEnvironment(Environment $environment): void
    {
        $this->environment = $environment;
    }

    #[Required]
    public function setMetaGroupLabelRepository(MetaGroupLabelRepository $metaGroupLabelRepository): void
    {
        $this->metaGroupLabelRepository = $metaGroupLabelRepository;
    }

    /**
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function renderForm(FormInterface $form, string $certificateType): string
    {
        $groups = $this->metaGroupLabelRepository->findByTable($certificateType);
        foreach ($groups as $group) {
            foreach ($form->all() as $field) {
                if ($group->grp == $field->getConfig()->getOption('attr')['groupLabel']) {
                    $group->fields[] = $field->createView();
                    $form->remove($field->getName());
                }
            }
        }

        return $this->environment->render('@ExpoActe/certificate/form/_form.html.twig', [
            'form' => $form->createView(),
            'groups' => $groups,
        ]);
    }

}