<?php declare(strict_types=1);

namespace Swag\ServiceBooking\Storefront\Framework\Twig\Extension;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Swag\ServiceBooking\Core\Content\ServiceBookingTemplate\Aggregate\ServiceBookingDate\ServiceBookingDateEntity;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\Extra\Intl\IntlExtension;
use Twig\TwigFilter;

class ServiceBookingDateFormatFilter extends AbstractExtension
{
    /**
     * @var EntityRepositoryInterface
     */
    private $serviceBookingDateRepository;

    public function __construct(EntityRepositoryInterface $serviceBookingDateRepository)
    {
        $this->serviceBookingDateRepository = $serviceBookingDateRepository;
    }

    public function getFilters()
    {
        return [
            new TwigFilter('swag_booking_date_format', [$this, 'formatDate'], ['needs_context' => true, 'needs_environment' => true])
        ];
    }

    public function formatDate(Environment $environment, array $twigContext, string $dateId): string
    {
        if (!array_key_exists('context', $twigContext)
            || (
                !$twigContext['context'] instanceof Context
                && !$twigContext['context'] instanceof SalesChannelContext
            )
        ) {
            throw new \InvalidArgumentException('Error while processing Twig currency filter. No context or locale given.');
        }

        /* @var Context $context */
        if ($twigContext['context'] instanceof Context) {
            $context = $twigContext['context'];
        } else {
            $context = $twigContext['context']->getContext();
        }

        /** @var ServiceBookingDateEntity|null $selectedDate */
        $selectedDate = $this->serviceBookingDateRepository->search(new Criteria([ $dateId ]), $context)->first();

        if ($selectedDate === null) {
            throw new \InvalidArgumentException('Error while processing Twig currency filter. No valid date found.');
        }

        $intlExtension = $environment->getExtension(IntlExtension::class);
        $startDate = $intlExtension->formatDateTime($environment, $selectedDate->getStart(), 'medium', 'short');
        $endDate = $intlExtension->formatDateTime($environment, $selectedDate->getEnd(), 'medium', 'short');

        if ($startDate === $endDate) {
            return $startDate;
        }

        return $startDate . ' - ' . $endDate;
    }
}
