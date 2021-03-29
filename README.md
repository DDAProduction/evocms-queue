# Queue (Очереди)

Пакет добавляет возможность использовать очереди как в laravel, за исключением методов из трейта dispatchable:  
```
dispatchIf  
dispatchUnless  
dispatchSync  
dispatchNow  
dispatchAfterResponse  
dispatchAfterResponse  
withChain  
```

## Установка
1. php artisan package:installrequire ddaproduction/evocms-queue "*"
2. php artisan vendor:publish --provider="EvolutionCMS\EvocmsQueue\EvocmsQueueServiceProvider"
3. php artisan queue:table
4. php artisan queue:failed-table
5. php artisan migrate

## Конфигурация 
Конфигурация находится в папке core/custom/config/queue.php

## Использование
### Создание задачи
1. Создать клас где вам удобно, например в пакете в папке jobs .
2. Отналедоватся от EvolutionCMS\EvocmsQueue\AbstractJob.
Пример:
```php
<?php
namespace EvolutionCMS\Main\Jobs;

use EvolutionCMS\EvocmsQueue\AbstractJob;
use Illuminate\Queue\InteractsWithQueue;

class Foo extends AbstractJob
{
    use InteractsWithQueue;

    /**
     * Execute the job.
     */
    public function handle()
    {
        // do something
    }

}
```
### Добавления задачи в очередь
```php 
$q = evo()->make('queue');
$q->push(new Foo());
```
или

```php
\Illuminate\Support\Facades\Queue::push(new \EvolutionCMS\Main\Jobs\Foo());
```