<?php

namespace Examples;

class Serial
{
    function __invoke()
    {
        echo "Serial: ";

        // do work
        for ($i = 0; $i < 10; $i++) {
            $things[] = function () {
                $s = 0;
                for ($i = 0; $i < 100000000; $i++) {
                    $s += $i * $i * $i;
                }
                return $s;
            };
        }

        // and measure the time
        $t0 = microtime(true);
        foreach ($things as $thing) {
            $thing();
            echo ".";
        }
        $t1 = microtime(true);
        echo "\n(serial) " . ($t1 - $t0) . " seconds\n";
    }
}
