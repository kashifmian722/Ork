<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\ServiceBooking\Core\Content\ServiceBookingTemplate\Aggregate\ServiceBookingDate;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\DateTimeField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Inherited;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Swag\ServiceBooking\Core\Content\ServiceBookingTemplate\ServiceBookingTemplateDefinition;

class ServiceBookingDateDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'swag_service_booking_date';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getCollectionClass(): string
    {
        return ServiceBookingDateCollection::class;
    }

    public function getEntityClass(): string
    {
        return ServiceBookingDateEntity::class;
    }

    protected function getParentDefinitionClass(): ?string
    {
        return ServiceBookingTemplateDefinition::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new PrimaryKey(), new Required()),

            (new DateTimeField('start', 'start'))->addFlags(new Inherited()),
            (new DateTimeField('end', 'end'))->addFlags(new Inherited()),

            (new FkField('template_id', 'templateId', ServiceBookingTemplateDefinition::class))->addFlags(new Required()),
            new ManyToOneAssociationField('template', 'template_id', ServiceBookingTemplateDefinition::class),
        ]);
    }
}
