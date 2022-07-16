<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\ServiceBooking\Core\Content\ServiceBookingTemplate;

use Shopware\Core\Content\Product\ProductEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use Swag\ServiceBooking\Core\Content\ServiceBookingTemplate\Aggregate\ServiceBookingDate\ServiceBookingDateCollection;

class ServiceBookingTemplateEntity extends Entity
{
    use EntityIdTrait;

    public const WEBINAR_TYPE = 'webinar';
    public const CONSULTING_TYPE = 'consulting';
    public const INSTALLATION_TYPE = 'installation';
    public const DEFAULT_TYPE = 'default';

    /**
     * @var string
     */
    protected $type = self::DEFAULT_TYPE;

    /**
     * @var ProductEntity
     */
    protected $product;

    /**
     * @var ServiceBookingDateCollection|null
     */
    protected $dates;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getProduct(): ProductEntity
    {
        return $this->product;
    }

    public function setProduct(ProductEntity $product): void
    {
        $this->product = $product;
    }

    public function getDates(): ?ServiceBookingDateCollection
    {
        return $this->dates;
    }

    public function setDates(?ServiceBookingDateCollection $dates): void
    {
        $this->dates = $dates;
    }
}
