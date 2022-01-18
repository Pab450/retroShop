<?php

namespace application;

use SplObjectStorage;

class SplRouteStorage extends SplObjectStorage
{
    public function attachRoute(Route $route, $info = null): void
    {
        parent::attach($route, $info);
    }
}