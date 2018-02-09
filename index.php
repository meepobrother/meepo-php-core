<?php

require_once __DIR__ . '/vendor/autoload.php';

use React\EventLoop\Factory;
use Rx\Observable;
use Rx\Scheduler;

$loop = Factory::create();

Scheduler::setDefaultFactory(function () use ($loop) {
    return new Scheduler\EventLoopScheduler($loop);
});

Observable::interval(1000)
    ->take(5)
    ->flatMap(function ($i) {
        return Observable::of($i + 1);
    })
    ->subscribe(function ($e) {
        echo $e, PHP_EOL;
    });

$loop->run();
