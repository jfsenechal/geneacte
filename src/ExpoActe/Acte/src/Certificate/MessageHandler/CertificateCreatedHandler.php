<?php

namespace ExpoActe\Acte\Certificate\MessageHandler;

use ExpoActe\Acte\Certificate\Message\CertificateCreated;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler()]
class CertificateCreatedHandler
{
    private FlashBagInterface $flashBag;

    public function __construct(RequestStack $requestStack)
    {
        $this->flashBag = $requestStack->getSession()?->getFlashBag();
    }

    public function __invoke(CertificateCreated $certificateCreated): void
    {
        $this->flashBag->add('success', 'Le certificat a bien été ajouté');
    }
}
