<?php

namespace ExpoActe\Acte\Doctrine\EventSubscriber;

use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use ExpoActe\Acte\Tools\PropertyUtil;

#[AsDoctrineListener(Events::prePersist)]
final class DatesSetSubscriber
{
    public function __construct(
        private PropertyUtil $propertyUtil
    ) {
    }

    /**
     * @return array<int, string>
     */
    public function getSubscribedEvents(): array
    {
        return [
            Events::prePersist,
        ];
    }

    public function prePersist(LifecycleEventArgs $lifecycleEventArgs): void
    {
        $entity = $lifecycleEventArgs->getObject();
        $accessor = $this->propertyUtil->getPropertyAccessor();
        $today = new \DateTime();

        if ($accessor->isWritable($entity, 'dtdepot')) {
            if (!$entity->getId()) {
                $entity->dtdepot = $today;
            }
        }
        if ($accessor->isWritable($entity, 'dtmodif')) {
            $entity->dtmodif = $today;
        }
        if ($accessor->isWritable($entity, 'dtcreation')) {
            if (!$entity->getId()) {
                $entity->dtcreation = $today;
            }
        }
    }

}
