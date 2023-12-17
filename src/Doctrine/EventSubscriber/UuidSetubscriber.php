<?php

namespace App\Doctrine\EventSubscriber;

use App\Tools\PropertyUtil;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;

#[AsDoctrineListener(Events::prePersist)]
final class UuidSetubscriber
{
    public function __construct(
        private PropertyUtil $propertyUtil
    ) {
    }

    public function getSubscribedEvents(): array
    {
        return [
            Events::prePersist,
            //   Events::preUpdate,
        ];
    }

    public function prePersist(LifecycleEventArgs $lifecycleEventArgs): void
    {
        $entity = $lifecycleEventArgs->getObject();
        if (!$this->propertyUtil->getPropertyAccessor()->isWritable($entity, 'uuid')) {
            return;
        }

        if ($entity->uuid) {
            return;
        }

        $entity->uuid = $entity->generateUuid();
    }
}
