<?php

namespace Training\Bundle\UserNamingBundle\Migrations\Schema\V1_1;

use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtension;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtensionAwareInterface;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

class AddUserNamingToUserRelation implements Migration, ExtendExtensionAwareInterface
{
    protected ExtendExtension $extendExtension;

    public function setExtendExtension(ExtendExtension $extendExtension): void
    {
        $this->extendExtension = $extendExtension;
    }

    public function up(Schema $schema, QueryBag $queries): void
    {
        $this->extendExtension->addManyToOneRelation(
            $schema,
            'oro_user',
            'typeOfNaming',
            'usernaming_user_naming_type',
            'title',
            [
                'extend' => [
                    'owner' => ExtendScope::OWNER_CUSTOM
                ]
            ]
        );
    }
}
