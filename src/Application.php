<?php

namespace Cblink\Service\Pay;

use Cblink\Service\Foundation\Container;
use Hyperf\Utils\Collection;

/**
 * @property-read Collection $config
 * @property-read \GuzzleHttp\Client $client
 * @property-read \Cblink\Service\Foundation\AccessToken $access_token
 *
 */
class Application extends Container
{
    /**
     * @var array
     */
    protected array $providers = [
        Kernel\ServiceProvider::class,
        Order\ServiceProvider::class,
        Refund\ServiceProvider::class,
    ];
}