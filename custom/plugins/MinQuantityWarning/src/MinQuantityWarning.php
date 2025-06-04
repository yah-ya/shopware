<?php declare(strict_types=1);

namespace MinQuantityWarning;

use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use Shopware\Storefront\Framework\ThemeInterface;

class MinQuantityWarning extends Plugin implements ThemeInterface
{
    public function install(InstallContext $installContext): void
    {
        parent::install($installContext);
    }

    public function uninstall(UninstallContext $uninstallContext): void
    {
        parent::uninstall($uninstallContext);
    }

    public function getThemeConfigPath(): string
    {
        return 'theme.json';
    }
} 