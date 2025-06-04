<?php 
declare(strict_types=1);

namespace MinQuantityWarning\Core\Service;

use Shopware\Core\System\SystemConfig\SystemConfigService;

class MinQuantityService
{
    public const SYSTEM_CONFIG_KEY = 'MinQuantityWarning.config.active';
    public const DEFAULT_MIN_QTY = 'MinQuantityWarning.config.number';

    public function __construct(
        private readonly SystemConfigService $systemConfigService
    ) {}

    public function isEnabled(): bool
    {
        return (bool) $this->systemConfigService->get(self::SYSTEM_CONFIG_KEY);
    }

    public function getMinimumQuantity(): int
    {
        return (int) $this->systemConfigService->get(self::DEFAULT_MIN_QTY);
    }

}
