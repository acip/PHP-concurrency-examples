<?php

namespace Examples\AmphpParallel;

class Task implements \Amp\Parallel\Worker\Task
{
    public function run(\Amp\Parallel\Worker\Environment $environment)
    {
        $s = 1;
        for ($i = 0; $i < 100000000; $i++) {
            $s += $i * $i * $i;
        }
        return $s;
    }
}
