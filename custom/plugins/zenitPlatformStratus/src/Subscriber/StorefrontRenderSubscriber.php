<?php declare(strict_types=1);

namespace zenit\PlatformStratus\Subscriber;

use Shopware\Core\Framework\Struct\ArrayEntity;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Shopware\Storefront\Event\StorefrontRenderEvent;
use Shopware\Core\System\SystemConfig\SystemConfigService;

use Twig\Environment;

use Shopware\Core\Content\Product\Events\ProductListingCriteriaEvent;
use Shopware\Core\Content\Product\Events\ProductSearchCriteriaEvent;
use Shopware\Core\Content\Product\Events\ProductSuggestCriteriaEvent;

class StorefrontRenderSubscriber implements EventSubscriberInterface
{

    /**
     * @var string
     */
    private $pluginName = 'zenitPlatformStratus';

    /**
     * @var string
     */
    private $configPath = 'zenitPlatformStratus.config.';

    /**
     * @var SystemConfigService
     */
    private $systemConfigService;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var mixed
     */
    private $themeConfig;

    public function __construct(SystemConfigService $systemConfigService, Environment $twig)
    {
        $this->systemConfigService = $systemConfigService;

        $this->twig = $twig;

        $globals = $this->twig->getGlobals();
        $themeConfig = $globals['shopware']['theme'];
        $this->themeConfig = $themeConfig;
    }

    public static function getSubscribedEvents(): array
    {
        // Return the events to listen to as array like this:  <event to listen to> => <method to execute>
        return [
            StorefrontRenderEvent::class => 'onStorefrontRender',
            ProductSuggestCriteriaEvent::class => 'handleSuggestRequest',
            ProductListingCriteriaEvent::class => 'handleListingRequest',
            ProductSearchCriteriaEvent::class => 'handleSearchRequest'
        ];
    }

    public function handleListingRequest(ProductListingCriteriaEvent $event)
    {
        if( isset($this->themeConfig['zen-product-listing-card-img-switch']) && $this->themeConfig['zen-product-listing-card-img-switch'] !== 'none' ) {
            $criteria = $event->getCriteria();
            $criteria->addAssociation('media');
        }
    }

    public function handleSuggestRequest(ProductSuggestCriteriaEvent $event)
    {
        if( isset($this->themeConfig['zen-product-listing-card-img-switch']) && $this->themeConfig['zen-product-listing-card-img-switch'] !== 'none' ) {
            $criteria = $event->getCriteria();
            $criteria->addAssociation('media');
        }
    }

    public function handleSearchRequest(ProductSearchCriteriaEvent $event)
    {
        if( isset($this->themeConfig['zen-product-listing-card-img-switch']) && $this->themeConfig['zen-product-listing-card-img-switch'] !== 'none' ) {
            $criteria = $event->getCriteria();
            $criteria->addAssociation('media');
        }
    }

    /**
     * @param StorefrontRenderEvent $event
     *
     * @throws \Shopware\Core\Framework\DataAbstractionLayer\Exception\InconsistentCriteriaIdsException
     * @throws \Shopware\Core\Framework\Uuid\Exception\InvalidUuidException
     * @throws \Shopware\Core\System\SystemConfig\Exception\InvalidDomainException
     */
    public function onStorefrontRender(StorefrontRenderEvent $event)
    {
        $shopId = $event->getSalesChannelContext()->getSalesChannel()->getId();

        // get config
        $systemConfig = $this->systemConfigService->getDomain($this->configPath, $shopId, true);

        // replace domainstrings in keys
        $config = [];
        foreach($systemConfig as $key => $value) {
            $config[str_replace($this->configPath, '',$key)] = $value;
        }

        // add banner id for StorageKey based on plugin-configuration
        $config['configId'] = self::generateConfigId($config);

        // add config & custom fields
        $event->getContext()->addExtension($this->pluginName, new ArrayEntity($config));
    }

    private function generateConfigId($config){
        $id = null;
        foreach($config as $key => $value) {
            if(is_array($value)) {
                $value = implode($value);
            }

            if(is_bool($value)) {
                $value = $value ? 'true': 'false';
            }

            $id .= strlen(strval($value));
        }

        return $id;
    }
}
