<?php

namespace Training\Bundle\UserNamingBundle\Provider;

use Oro\Bundle\EntityBundle\Provider\EntityNameProviderInterface;
use Oro\Bundle\UserBundle\Entity\User;

class EntityNameProviderDecorator implements EntityNameProviderInterface
{
    public function __construct(
        private readonly EntityNameProviderInterface $originalProvider,
        private readonly FullNameProvider $fullNameProvider
    )
    {
    }

    public function getName($format, $locale, $entity): string|bool
    {
        if (!$entity instanceof User) {
            return false;
        }

        $typeOfNaming = $entity->get('typeOfNaming');

        return $typeOfNaming
            ? $this->fullNameProvider->getFullUserName($entity, $typeOfNaming->getFormat())
            : sprintf('%s %s %s', $entity->getLastName(), $entity->getFirstName(), $entity->getMiddleName());
    }

    public function getNameDQL($format, $locale, $className, $alias): string
    {
        return $this->originalProvider->getNameDQL($format, $locale, $className, $alias);
    }
}
