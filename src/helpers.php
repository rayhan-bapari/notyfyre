<?php

if (! function_exists('notyfyre')) {
    /**
     * Get the Notyfyre instance.
     */
    function notyfyre(): \RayhanBapari\Notyfyre\Notyfyre
    {
        return app('notyfyre');
    }
}
