<?php

namespace Examples\AmphpParallel;

class DoWork
{
    public function __invoke($params)
    {
        echo "DoWork invoked with params: " . json_encode($params) . "\n";

        $s = 1;
        for ($i = 0; $i < 100000000; $i++) {
            $s += $i * $i * $i;
        }
        return $s;
    }
}
