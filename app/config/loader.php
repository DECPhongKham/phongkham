<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerNamespaces(
    [
        'App\Controllers'=> $config->application->controllersDir,
        'App\Models'=>   $config->application->modelsDir,
        'App\Auth'=>APP_PATH.'/library/Auth',
        'App\Forms'=>APP_PATH.'/forms'
    ]
);
$loader->register();
