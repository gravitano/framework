<?php

$app = new Gravitano\Foundation\Application;

$app->setPaths(require __DIR__ . '/paths.php');

require $app->path('src') . '/Gravitano/Foundation/start.php';

return $app;