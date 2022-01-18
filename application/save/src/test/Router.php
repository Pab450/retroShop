<?php

namespace application\src\test;

use application\src\Router as roottest;

class Router {

	public function __construct(){
        var_dump("router 2 called");
        new roottest();
    }
}