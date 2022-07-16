<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\ServiceBooking\Core\Content\ServiceBookingTemplate\Aggregate\ServiceBookingDate;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use Swag\ServiceBooking\Core\Content\ServiceBookingTemplate\ServiceBookingTemplateEntity;

class ServiceBookingDateEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var \DateTimeInterface
     */
    protected $start;

    /**
     * @var \DateTimeInterface
     */
    protected $end;

    /**
     * @var ServiceBookingTemplateEntity
     */
    protected $template;

    public function getStart(): \DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(\DateTimeInterface $start): void
    {
        $this->start = $start;
    }

    public function getEnd(): \DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(\DateTimeInterface $end): void
    {
        $this->end = $end;
    }

    public function getTemplate(): ServiceBookingTemplateEntity
    {
        return $this->template;
    }

    public function setTemplate(ServiceBookingTemplateEntity $template): void
    {
        $this->template = $template;
    }
}
