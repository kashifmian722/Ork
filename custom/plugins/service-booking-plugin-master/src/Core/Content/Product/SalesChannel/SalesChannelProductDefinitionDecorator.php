<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\ServiceBooking\Core\Content\Product\SalesChannel;

use Shopware\Core\Content\Product\SalesChannel\SalesChannelProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\System\SalesChannel\SalesChannelContext;

class SalesChannelProductDefinitionDecorator extends SalesChannelProductDefinition
{
    public function processCriteria(Criteria $criteria, SalesChannelContext $context): void
    {
        parent::processCriteria($criteria, $context);

        $criteria->addAssociation('serviceBookingTemplate.dates');
    }
}
