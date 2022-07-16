<?php declare(strict_types=1);

namespace SwagBasicExample\Core\Content\Example;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;

class ExampleDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'swag_example';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }
   
       public function getCollectionClass(): string
    {
        return ExampleCollection::class;
    }
   public function getEntityClass(): string
    {
        return ExampleEntity::class;
    }
    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            (new StringField('name', 'name')),
            (new StringField('first_name', 'firstName')),
            (new StringField('phone', 'phone')),
            (new StringField('email', 'email')),
            (new StringField('type', 'type')),
            (new StringField('pick_date', 'pickDate'))
        ]);
    }
}