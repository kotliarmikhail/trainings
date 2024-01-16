<?php

namespace Training\Bundle\UserNamingBundle\Migrations\Schema;

use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtension;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtensionAwareInterface;
use Oro\Bundle\MigrationBundle\Migration\Installation;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

/**
 * @SuppressWarnings(PHPMD.TooManyMethods)
 * @SuppressWarnings(PHPMD.ExcessiveClassLength)
 */
class TrainingUserNamingBundleInstaller implements Installation, ExtendExtensionAwareInterface
{
    private ExtendExtension $extendExtension;

    public function setExtendExtension(ExtendExtension $extendExtension): void
    {
        $this->extendExtension = $extendExtension;
    }

    public function getMigrationVersion(): string
    {
        return 'v1_1';
    }

    public function up(Schema $schema, QueryBag $queries): void
    {
        $this->createUserNamingTypeTable($schema);
        $this->addRelationFromUser($schema);
    }

    protected function createUserNamingTypeTable(Schema $schema): void
    {
        $table = $schema->createTable('usernaming_user_naming_type');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('title', 'string', ['length' => 64]);
        $table->addColumn('format', 'string', ['length' => 255]);
        $table->addColumn('serialized_data', 'json', ['notnull' => false]);
        $table->setPrimaryKey(['id']);
    }

    protected function addRelationFromUser(Schema $schema): void
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
