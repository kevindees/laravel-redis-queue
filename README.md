# Laravel Redis Queue

A little command line tool for clearing Laravel redis queues.

## Basic Clear

This command clears the redis queue defined in your `config/queue.php` file. The configuration is normally set to `default`.

```shell
php artisan queue:redis -C
```

Outputs,

```
Clearing Redis queues:default
```

## Defined Queue Clear

To clear a defined queue specify it in the artisan command as an augument.

```shell
php artisan queue:redis emails -C
```

Outputs,

```
Clearing Redis queues:emails
```