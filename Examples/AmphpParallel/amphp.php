<?php

require_once __DIR__ . '/../../vendor/autoload.php';

// call serial to establish a baseline
(new Examples\Serial())->__invoke();

// create a pool of max 3 workers
$pool  = new Amp\Parallel\Worker\DefaultPool();

$promises = [];
foreach (range(1, 10) as $i) {
    // $promises[] = $pool->enqueue(new Examples\AmphpParallel\Task());
    $promises[] = $pool->enqueue(new Amp\Parallel\Worker\CallableTask(new \Examples\AmphpParallel\DoWork, [$i]));
}

// measure the time for the async version
$t0 = microtime(true);
$responses = Amp\Promise\wait(Amp\Promise\all($promises));
$t1 = microtime(true);
echo "\n(async) " . ($t1 - $t0) . " seconds\n";

