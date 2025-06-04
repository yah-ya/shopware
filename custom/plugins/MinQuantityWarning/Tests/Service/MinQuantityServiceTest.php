<?php declare(strict_types=1);

namespace MinQuantityWarning\Tests\Service;

use MinQuantityWarning\Core\Service\MinQuantityService;
use PHPUnit\Framework\TestCase;
use Shopware\Core\System\SystemConfig\SystemConfigService;

class MinQuantityServiceTest extends TestCase
{
    public function testGetMinimumQuantity(): void
    {
        $mockSystemConfig = $this->createMock(SystemConfigService::class);
        $mockSystemConfig->method('get')
            ->with(MinQuantityService::DEFAULT_MIN_QTY)
            ->willReturn(5);

        $service = new MinQuantityService($mockSystemConfig);
        $this->assertSame(5, $service->getMinimumQuantity());
    }

    public function testEnabledFeature(): void
    {
        $mockSystemConfig = $this->createMock(SystemConfigService::class);
        $mockSystemConfig->method('get')
            ->with(MinQuantityService::SYSTEM_CONFIG_KEY)
            ->willReturn(true);

        $service = new MinQuantityService($mockSystemConfig);
        $this->assertTrue($service->isEnabled());
    }

    public function testDisabledFeature(): void
    {
        $mockSystemConfig = $this->createMock(SystemConfigService::class);
        $mockSystemConfig->method('get')
            ->with(MinQuantityService::SYSTEM_CONFIG_KEY)
            ->willReturn(false);

        $service = new MinQuantityService($mockSystemConfig);
        $this->assertFalse($service->isEnabled());
    }
}
