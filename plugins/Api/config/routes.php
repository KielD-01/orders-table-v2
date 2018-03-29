<?php

use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'Api',
    ['path' => '/api'],
    function (RouteBuilder $routes) {
        $routes->resources('Translations');
        $routes->connect('/translations/:language', ['controller' => 'Translations', 'action' => 'view', '_method' => 'GET']);

        $routes->connect('/exist/:type', ['controller' => 'Exist', 'action' => 'getManufacturers'])->setPass(['type']);
        $routes->connect('/exist/:type/:manufacturer', ['controller' => 'Exist', 'action' => 'getGeneralModels'])->setPass(['type', 'manufacturer']);
        $routes->connect('/exist/:type/:manufacturer/:model', ['controller' => 'Exist', 'action' => 'getModels'])->setPass(['type', 'manufacturer', 'model']);
        $routes->connect('/mods/exist/:type/:model', ['controller' => 'Exist', 'action' => 'getModifications'])->setPass(['type', 'model']);
        $routes->connect('/parts/exist/:type/:model/:modification', ['controller' => 'Exist', 'action' => 'getParts'])->setPass(['type', 'model', 'modification']);

        $routes->connect('/vehicle/types', ['controller' => 'VehicleTypes', 'action' => 'getVehicleTypes']);

        $routes->fallbacks(DashedRoute::class);
    }
);
