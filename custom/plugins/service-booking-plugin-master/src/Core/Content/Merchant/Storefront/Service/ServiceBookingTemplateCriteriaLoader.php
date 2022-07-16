<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\ServiceBooking\Core\Content\Merchant\Storefront\Service;

use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Production\Merchants\Content\Merchant\Storefront\Service\MerchantCriteriaLoaderInterface;

class ServiceBookingTemplateCriteriaLoader implements MerchantCriteriaLoaderInterface
{
    /**
     * @var MerchantCriteriaLoaderInterface
     */
    private $criteriaLoader;

    public function __construct(MerchantCriteriaLoaderInterface $criteriaLoader)
    {
        $this->criteriaLoader = $criteriaLoader;
    }

    public function getMerchantCriteria(Criteria $criteria): Criteria
    {
        $criteria = $this->criteriaLoader->getMerchantCriteria($criteria);
        $criteria->addAssociation('products.serviceBookingTemplate.dates');

        return $criteria;
    }
}
