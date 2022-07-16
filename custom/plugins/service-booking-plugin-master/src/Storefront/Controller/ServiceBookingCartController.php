<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\ServiceBooking\Storefront\Controller;

use Shopware\Core\Checkout\Cart\Cart;
use Shopware\Core\Checkout\Cart\LineItem\LineItem;
use Shopware\Core\Checkout\Cart\SalesChannel\CartService;
use Shopware\Core\Framework\Routing\Annotation\RouteScope;
use Shopware\Core\Framework\Routing\Exception\MissingRequestParameterException;
use Shopware\Core\Framework\Uuid\Exception\InvalidUuidException;
use Shopware\Core\Framework\Uuid\Uuid;
use Shopware\Core\Framework\Validation\DataBag\RequestDataBag;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Storefront\Controller\StorefrontController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @RouteScope(scopes={"storefront"})
 */
class ServiceBookingCartController extends StorefrontController
{
    public const SERVICE_BOOKING_TEMPLATE_REQUEST_PARAMETER = 'service-booking-template';

    /**
     * @var CartService
     */
    private $cartService;

    public function __construct(
        CartService $cartService
    ) {
        $this->cartService = $cartService;
    }

    /**
     * @Route("/checkout/service-booking/add", name="frontend.checkout.service-booking.add", methods={"POST"}, defaults={"XmlHttpRequest"=true})
     *
     * @throws MissingRequestParameterException
     * @throws InvalidUuidException
     */
    public function addServiceBookingProduct(
        Cart $cart,
        RequestDataBag $requestDataBag,
        Request $request,
        SalesChannelContext $salesChannelContext
    ): Response {
        /** @var RequestDataBag|null $serviceBookingDataBag */
        $serviceBookingDataBag = $requestDataBag->get(self::SERVICE_BOOKING_TEMPLATE_REQUEST_PARAMETER);
        if ($serviceBookingDataBag === null) {
            throw new MissingRequestParameterException(self::SERVICE_BOOKING_TEMPLATE_REQUEST_PARAMETER);
        }

        $serviceBookingTemplateId = $serviceBookingDataBag->get('id');
        if (!Uuid::isValid($serviceBookingTemplateId)) {
            throw new InvalidUuidException($serviceBookingTemplateId);
        }

        $selectedServiceBookingDateId = $serviceBookingDataBag->get('dateId');
        if (!Uuid::isValid($selectedServiceBookingDateId)) {
            throw new InvalidUuidException($selectedServiceBookingDateId);
        }

        $lineItems = $request->request->get('lineItems', []);

        /** @var array|false $product */
        $product = reset($lineItems);
        if ($product === false) {
            throw new MissingRequestParameterException('lineItems');
        }

        $productLineItem = new LineItem($product['id'], $product['type'], $product['referencedId'], (int) $product['quantity']);
        $productLineItem->setRemovable((bool) $product['removable']);
        $productLineItem->setStackable((bool) $product['stackable']);
        $productLineItem->setPayloadValue(
            'serviceBookingTemplate',
            [
                'id' => $serviceBookingTemplateId,
                'dateId' => $selectedServiceBookingDateId,
            ]
        );

        $this->cartService->add($cart, $productLineItem, $salesChannelContext);

        return $this->createActionResponse($request);
    }
}
