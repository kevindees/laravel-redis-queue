# Laravel Redis Queue

A little command line tool for clearing Laravel Redis queues. This package is for Laravel 5 and removes all jobs from a queue using the Redis driver. 

## Basic Clear

This command clears the Redis queue defined in your `config/queue.php` file. The configuration is normally set to `default`.

```shell
php artisan queue:redis -C
```

Outputs,

```
Clearing Redis queues:default
```

## Defined Queue Clear

To clear a specific queue like `emails` pass it as an argument.

```shell
php artisan queue:redis emails -C
```

Outputs,

```
Clearing Redis queues:emails
```