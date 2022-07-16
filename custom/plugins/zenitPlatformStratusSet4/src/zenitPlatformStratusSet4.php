<?php declare(strict_types=1);

namespace zenit\PlatformStratusSet4;

use Shopware\Storefront\Framework\ThemeInterface;
use Shopware\Core\Framework\Plugin;

class zenitPlatformStratusSet4 extends Plugin implements ThemeInterface
{
    public function getThemeConfigPath(): string
    {
        return 'theme.json';
    }
}
