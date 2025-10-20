<?php

namespace RayhanBapari\Notyfyre;

use Illuminate\Support\Facades\Session;

class Notyfyre
{
    /**
     * The session key for storing notifications.
     */
    private const SESSION_KEY = 'notyfyre_notifications';

    /**
     * Add a success notification.
     */
    public function success(string $title, array $options = []): self
    {
        return $this->add('success', $title, $options);
    }

    /**
     * Add an error notification.
     */
    public function error(string $title, array $options = []): self
    {
        return $this->add('error', $title, $options);
    }

    /**
     * Add a warning notification.
     */
    public function warning(string $title, array $options = []): self
    {
        return $this->add('warning', $title, $options);
    }

    /**
     * Add an info notification.
     */
    public function info(string $title, array $options = []): self
    {
        return $this->add('info', $title, $options);
    }

    /**
     * Add a notification to the session.
     */
    private function add(string $type, string $title, array $options = []): self
    {
        $notifications = Session::get(self::SESSION_KEY, []);

        $notification = array_merge([
            'type' => $type,
            'title' => $title,
            'position' => config('notyfyre.position', 'top-center'),
            'autoClose' => config('notyfyre.auto_close', 3000),
            'progress' => config('notyfyre.progress', true),
        ], $options);

        $notifications[] = $notification;

        Session::put(self::SESSION_KEY, $notifications);

        return $this;
    }

    /**
     * Get all notifications from the session.
     */
    public function getNotifications(): array
    {
        return Session::get(self::SESSION_KEY, []);
    }

    /**
     * Clear all notifications from the session.
     */
    public function clear(): void
    {
        Session::forget(self::SESSION_KEY);
    }

    /**
     * Get notifications and clear them from session.
     */
    public function getAndClear(): array
    {
        $notifications = $this->getNotifications();
        $this->clear();
        return $notifications;
    }

    /**
     * Set default options for all notifications.
     */
    public function setDefaults(array $options): self
    {
        foreach ($options as $key => $value) {
            config(['notyfyre.' . $key => $value]);
        }

        return $this;
    }
}
