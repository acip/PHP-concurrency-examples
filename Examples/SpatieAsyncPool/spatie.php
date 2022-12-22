<?php

require_once __DIR__ . '/../../vendor/autoload.php';

// call serial to establish a baseline
// (new Examples\Serial())->__invoke();

$pool = Spatie\Async\Pool::create()->concurrency(3);

$things = [];
foreach (range(1, 10) as $i) {
    $things[] = function () {
        $s = 0;
        for ($i = 0; $i < 100000000; $i++) {
            $s += $i * $i * $i;
        }
        return $s;
    };
}

// measure the time for the async version
$t0 = microtime(true);
foreach ($things as $thing) {
    $pool->add($thing)
        ->then(function ($output) {
            echo ".";
        })->catch(function (Throwable $exception) {
            echo $exception->getMessage();
        });
}


$pool->wait();
$t1 = microtime(true);
echo "\n(spatie async) " . ($t1 - $t0) . " seconds\n";
