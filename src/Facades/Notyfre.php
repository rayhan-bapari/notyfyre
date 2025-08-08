<?php

namespace RayhanBapari\Notyfyre\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \RayhanBapari\Notyfyre\Notyfyre success(string $message, string $title = null, array $options = [])
 * @method static \RayhanBapari\Notyfyre\Notyfyre error(string $message, string $title = null, array $options = [])
 * @method static \RayhanBapari\Notyfyre\Notyfyre warning(string $message, string $title = null, array $options = [])
 * @method static \RayhanBapari\Notyfyre\Notyfyre info(string $message, string $title = null, array $options = [])
 * @method static array getNotifications()
 * @method static void clear()
 * @method static array getAndClear()
 * @method static \RayhanBapari\Notyfyre\Notyfyre setDefaults(array $options)
 *
 * @see \RayhanBapari\Notyfyre\Notyfyre
 */
class Notyfyre extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'notyfyre';
    }
}
