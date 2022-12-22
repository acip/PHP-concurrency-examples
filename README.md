# Examples of PHP concurrency using different libraries

## Amphp parallel - [website](https://amphp.org/parallel/)

> Provides true parallel processing for PHP using multiple processes or native threads, without blocking and no **extensions required**.

If `ext-parallel` is installed, it will use threads, otherwise it will use processes.

Pro: can change concurrency level.

```php
$pool  = new Amp\Parallel\Worker\DefaultPool(3);
```

## Spatie async - [website](https://github.com/spatie/async)

> wrapper around PHP's PCNTL extension.

Requires `ext-pcntl`, Linux only. Uses processes.

Pro: can change concurrency level.

```php
$pool = Spatie\Async\Pool::create()->concurrency(3);
```
