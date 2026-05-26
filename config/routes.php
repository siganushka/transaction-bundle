<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Siganushka\TransactionBundle\Controller\TransactionController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return static function (RoutingConfigurator $routes): void {
    $routes->add('siganushka_transaction_getcollection', '/transactions')
        ->controller([TransactionController::class, 'getCollection'])
        ->methods(['GET'])
    ;

    $routes->add('siganushka_transaction_getitem', '/transactions/{number<[0-9a-zA-Z]+>}')
        ->controller([TransactionController::class, 'getItem'])
        ->methods(['GET'])
    ;
};
