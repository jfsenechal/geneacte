<?php

namespace ExpoActe\Acte\Label\Form;

use ExpoActe\Acte\Entity\MetaLabel;
use ExpoActe\Acte\Label\LabelDocumentEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MetaLabelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('etiq', TextType::class, [
                'label' => false,
            ])
            ->add('labelDocumentEnum', EnumType::class, [
                'class' => LabelDocumentEnum::class,
                'label' => false,
                'choice_label' => fn (LabelDocumentEnum $labelDocumentEnum) => $labelDocumentEnum->getLabel(),
                'placeholder' => 'Sélectionnez',
            ]);

        /*  $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event): void {
              /**
               * @var MetaLabel $data
               *
              $data = $event->getData();
              $form = $event->getForm();

              if (str_contains($data->metaDb->zone, 'PRE')) {

              } else {
                  $form->add('documentEnum', EnumType::class, [
                      'class' => LabelDocumentEnum::class,
                      'label' => false,
                      'choice_label' => fn(LabelDocumentEnum $labelDocumentEnum) => $labelDocumentEnum->getLabel(),
                      'placeholder' => 'Sélectionnez',
                  ]);
              }
          });*/
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MetaLabel::class,
        ]);
    }
}
