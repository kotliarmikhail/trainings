<?php

namespace Training\Bundle\UserNamingBundle\ImportExport\TemplateFixture;

use Oro\Bundle\ImportExportBundle\TemplateFixture\AbstractTemplateRepository;
use Oro\Bundle\ImportExportBundle\TemplateFixture\TemplateFixtureInterface;
use Training\Bundle\UserNamingBundle\Entity\UserNamingType;

class UserNamingTypeFixture extends AbstractTemplateRepository implements TemplateFixtureInterface
{
    public function getEntityClass(): string
    {
        return UserNamingType::class;
    }

    public function getData(): \Iterator
    {
        return $this->getEntityData('Full name');
    }

    protected function createEntity($key)
    {
        return new UserNamingType();
    }

    public function fillEntityData($key, $entity): void
    {
        if ('Full name' === $key) {
            $entity->setTitle('Full name');
            $entity->setFormat('PREFIX FIRST MIDDLE LAST SUFFIX');

            return;
        }

        parent::fillEntityData($key, $entity);
    }
}
