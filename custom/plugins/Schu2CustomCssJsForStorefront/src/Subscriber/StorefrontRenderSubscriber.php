<?php declare(strict_types=1);

namespace Schu2\CustomCssJsForStorefront\Subscriber;

use Shopware\Core\Framework\Struct\ArrayEntity;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Shopware\Storefront\Event\StorefrontRenderEvent;
use Twig\Environment;

class StorefrontRenderSubscriber implements EventSubscriberInterface
{
    private $pluginName = 'Schu2CustomCssJsForStorefront';
    private $configPath = 'Schu2CustomCssJsForStorefront.config.';
    private $systemConfigService;
    private $twig;
    private $themeConfig;

    public function __construct(SystemConfigService $systemConfigService, Environment $twig)
    {
        $this->systemConfigService = $systemConfigService;
        $this->twig = $twig;
        $globals = $this->twig->getGlobals();
        $themeConfig = $globals['shopware']['theme'];
        $this->themeConfig = $themeConfig;
    }

    public static function getSubscribedEvents()
    {
        return [
            StorefrontRenderEvent::class => 'onStorefrontRender'
        ];
    }

    public function onStorefrontRender(StorefrontRenderEvent $event)
    {
        $shopId = $event->getSalesChannelContext()->getSalesChannel()->getId();

        // get config
        $systemConfig = $this->systemConfigService->getDomain($this->configPath, $shopId, true);

        //replace domain strings in keys
        $config = [];
        foreach ($systemConfig as $key => $value){
            $config[str_replace($this->configPath, '', $key)] =  $value;
        }

        // add banner id for StorageKey based on plugin-configuration
        $config['id'] = self::generateBannerId($config);

        // add config and custom fields
        $event->getContext()->addExtension($this->pluginName, new ArrayEntity($config));
    }

    private function generateBannerId($config){
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
