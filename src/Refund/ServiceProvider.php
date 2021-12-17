<?php

namespace Cblink\Service\Pay\Refund;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['refund'] = function($pimple){
            return new Client($pimple);
        };
    }
}