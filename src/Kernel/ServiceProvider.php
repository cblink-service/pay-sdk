<?php

namespace Cblink\Service\Pay\Kernel;

use Cblink\Service\Foundation\AccessToken;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['access_token'] = function($pimple){
            return new AccessToken($pimple);
        };
    }
}