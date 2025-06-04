<?php

use Symfony\Component\Dotenv\Dotenv;

$loader = require dirname(__DIR__).'/vendor/autoload.php';
\Shopware\Core\Framework\Test\TestCaseBase\KernelLifecycleManager::prepare($loader);

if (method_exists(Dotenv::class, 'bootEnv')) {
    (new Dotenv())->bootEnv(dirname(__DIR__).'/.env');
}

if ($_SERVER['APP_DEBUG']) {
    umask(0000);
}
