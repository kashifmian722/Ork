<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\ServiceBooking\Core\Content\ServiceBookingTemplate;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void                                        add(ServiceBookingTemplateEntity $entity)
 * @method void                                        set(string $key, ServiceBookingTemplateEntity $entity)
 * @method \Generator<ServiceBookingTemplateEntity>    getIterator()
 * @method ServiceBookingTemplateEntity[]              getElements()
 * @method ServiceBookingTemplateEntity|null           get(string $key)
 * @method ServiceBookingTemplateEntity|null           first()
 * @method ServiceBookingTemplateEntity|null           last()
 */
class ServiceBookingTemplateCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return ServiceBookingTemplateEntity::class;
    }
}
