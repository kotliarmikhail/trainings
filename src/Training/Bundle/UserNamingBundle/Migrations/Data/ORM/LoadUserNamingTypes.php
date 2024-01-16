<?php

namespace Training\Bundle\UserNamingBundle\Migrations\Data\ORM;

use Doctrine\Persistence\ObjectManager;
use Oro\Bundle\MigrationBundle\Fixture\VersionedFixtureInterface;
use Oro\Bundle\SaleBundle\Tests\Functional\DataFixtures\AbstractFixture;
use Training\Bundle\UserNamingBundle\Entity\UserNamingType;

class LoadUserNamingTypes extends AbstractFixture implements VersionedFixtureInterface
{
    private array $namingTypes = [
        'Official' => 'PREFIX FIRST MIDDLE LAST SUFFIX',
        'Unofficial' => 'FIRST LAST',
        'First name only' => 'FIRST',
        'haha' => 'PREFIX PREFIX FIRST',
        'hoho' => 'PREFIX FIRST FIRST',
    ];

    public function getVersion(): string
    {
        return '1.0';
    }

    public function load(ObjectManager $manager): void
    {
        foreach ($this->namingTypes as $title => $format) {
            $type = new UserNamingType();
            $type->setTitle($title);
            $type->setFormat($format);

            $manager->persist($type);
        }

        $manager->flush();
    }
}
