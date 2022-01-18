<?php

namespace application;

/**
 * Class Session
 * @package application
 */
class Session
{
    /**
     * Session constructor.
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * @param int|string $key
     * @param mixed $value
     */
    public function setData(int|string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param int|string $key
     * @return mixed
     */
    public function getData(int|string $key): mixed
    {
        return $_SESSION[$key] ?? null;
    }

    /**
     * @param int|string $key
     */
    public function unsetData(int|string $key): void
    {
        unset($_SESSION[$key]);
    }

    /**
     * @return bool
     */
    public function destroy(): bool
    {
        return session_destroy();
    }
}