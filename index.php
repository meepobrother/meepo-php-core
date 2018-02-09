<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

$createStdoutObserver = function ($prefix = '') {
    return new \Rx\Observer\CallbackObserver(
        function ($value) use ($prefix) {echo $prefix . "Next value: " . asString($value) . "\n";},
        function ($error) use ($prefix) {echo $prefix . "Exception: " . $error->getMessage() . "\n";},
        function () use ($prefix) {echo $prefix . "Complete!\n";}
    );
};

try {
    $subject = new \Rx\Subject\AsyncSubject();
    // Send a value
    $subject->onNext('42');
    $subject->onCompleted();
    // Hide its type
    $source = $subject->asObservable();
    $source->subscribe($createStdoutObserver());
} catch (Exception $e) {
    print_r("error log start \n");
    print_r($e);
    print_r("error log end \n");
}
