# Laravel Redis Queue

A little command line tool for clearing Laravel Redis queues. This package is for Laravel 5 and removes all jobs from a queue using the Redis driver. Because [Laravel Horizon](https://laravel.com/docs/5.6/horizon) uses Redis for its queues, this tool can be used to clear your Horizon jobs.

*If you are using Horizon, it may be best to have a separate Redis connection for your jobs and another for other parts of your application.*

## Install

You can install this Laravel package using [Composer](https://getcomposer.org/) by running the following command.

```shell
composer require kevindees/laravel-redis-queue
```

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
