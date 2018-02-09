<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';
use React\EventLoop\Factory;
use Rx\Observable;

try {

    $loop = Factory::create();

    Observable::interval(1000)
        ->take(5)
        ->flatMap(function ($i) {
            return Observable::of($i + 1);
        })
        ->subscribe(function ($e) {
            echo $e, PHP_EOL;
        });

    $loop->run();
} catch (Exception $e) {
    print_r($e);
}
