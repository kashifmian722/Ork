<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\ServiceBooking\Core\Content\ServiceBookingTemplate\Aggregate\ServiceBookingDate;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void                                    add(ServiceBookingDateEntity $entity)
 * @method void                                    set(string $key, ServiceBookingDateEntity $entity)
 * @method \Generator<ServiceBookingDateEntity>    getIterator()
 * @method ServiceBookingDateEntity[]              getElements()
 * @method ServiceBookingDateEntity|null           get(string $key)
 * @method ServiceBookingDateEntity|null           first()
 * @method ServiceBookingDateEntity|null           last()
 */
class ServiceBookingDateCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return ServiceBookingDateEntity::class;
    }
}
