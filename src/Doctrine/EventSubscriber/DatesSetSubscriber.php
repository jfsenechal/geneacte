<?php

namespace App\Doctrine\EventSubscriber;

use App\Tools\PropertyUtil;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;

#[AsDoctrineListener(Events::prePersist)]
final class DatesSetSubscriber
{
    public function __construct(
        private PropertyUtil $propertyUtil
    ) {
    }

    public function getSubscribedEvents(): array
    {
        return [
            Events::prePersist,
        ];
    }

    public function prePersist(LifecycleEventArgs $lifecycleEventArgs): void
    {
        $entity = $lifecycleEventArgs->getObject();
        if (!$this->propertyUtil->getPropertyAccessor()->isWritable($entity, 'dtdepot')) {
            return;
        }
        if (!$this->propertyUtil->getPropertyAccessor()->isWritable($entity, 'dtmodif')) {
            return;
        }

        $today = new \DateTime();
        if (!$entity->getId()) {
            $entity->dtdepot = $today->format('Y-m-d');
        }
        $entity->dtmodif = $today->format('Y-m-d');
    }

}
