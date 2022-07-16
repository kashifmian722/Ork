<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\ServiceBooking\Core\Content\ServiceBookingTemplate;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\CascadeDelete;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Swag\ServiceBooking\Core\Content\ServiceBookingTemplate\Aggregate\ServiceBookingDate\ServiceBookingDateDefinition;

class ServiceBookingTemplateDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'swag_service_booking_template';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getCollectionClass(): string
    {
        return ServiceBookingTemplateCollection::class;
    }

    public function getEntityClass(): string
    {
        return ServiceBookingTemplateEntity::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new PrimaryKey(), new Required()),
            (new FkField('product_id', 'productId', ProductDefinition::class))->addFlags(new Required()),

            (new StringField('type', 'type'))->addFlags(new Required()),

            (new OneToManyAssociationField('dates', ServiceBookingDateDefinition::class, 'template_id'))->addFlags(new CascadeDelete()),
            (new OneToOneAssociationField('product', 'product_id', 'id', ProductDefinition::class))->addFlags(new CascadeDelete()),
        ]);
    }
}
