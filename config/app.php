<?php

return [

    'debug'     =>  true,

    'providers' => [
        'Gravitano\Exception\ExceptionServiceProvider',
        'Gravitano\Http\HttpServiceProvider',
        'Gravitano\Routing\RoutingServiceProvider',
        'Gravitano\View\ViewServiceProvider',
        'Gravitano\Twig\TwigServiceProvider',
    ]

];