<?php

namespace App\Certificate;

use App\Certificate\Factory\CertificateFactoryInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\DependencyInjection\Attribute\TaggedLocator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Contracts\Service\ServiceProviderInterface;

readonly class CertificateFactory
{
    public function __construct(
        #[TaggedLocator(CertificateFactoryInterface::class, defaultIndexMethod: 'getType')]
        private ServiceProviderInterface $factories,
    ) {
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getFactory(string $type): CertificateFactoryInterface
    {
        if (!$this->factories->has($type)) {
            throw new NotFoundHttpException('Format not supported.');
        }

        return $this->factories->get($type);
    }
}