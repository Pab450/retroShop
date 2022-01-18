<?php

require "vendor/autoload.php";

use application\Route;
use application\controller\HelloController;

$controller = new ReflectionClass(HelloController::class);

foreach($controller->getMethods() as $method)
{
    foreach($method->getAttributes(Route::class) as $attribute){
        $route = $attribute->newInstance();
        $route->setReflectionMethod($method);

        if(in_array($_SERVER['REQUEST_METHOD'], $route->getHttpMethods()))
        {
            if(preg_match($route->getRegularExpression(), $_GET['path'], $matches)){
                $class = $route->getReflectionMethod()?->getDeclaringClass()->newInstance();

                array_shift($matches);
                array_pop($matches);

                $route->getReflectionMethod()?->invokeArgs($class, $matches);
            }
        }
    }
}

/*foreach(Route::getRoutes($_SERVER['REQUEST_METHOD']) as $key => $value){

    if(preg_match($key, $_GET['path'], $matches)){
        echo '<pre>' . var_export($matches, true) . '</pre>';


        $class = $value->getDeclaringClass()->newInstance();

        array_shift($matches);
        array_pop($matches);

        $value->invokeArgs($class, $matches);
    }
}*/

/*
$routes = [];

$controller_class = new ReflectionClass(HelloController::class);

foreach($controller_class->getAttributes(Route::class) as $routeClassAttribute)
{

    $class_route = $routeClassAttribute->newInstance();

    foreach($controller_class->getMethods() as $method)
    {
        foreach($method->getAttributes(SubRoute::class) as $subRouteAttribute)
        {

            $class_subRoute = $subRouteAttribute->newInstance();
            $class_subRoute->setClosure($method->getClosure(new HelloController()));

            $class_route->addSubRoute($class_subRoute);
        }
    }
}

foreach($controller_class->getMethods() as $method)
{
    foreach($method->getAttributes(Route::class) as $routeMethodAttribute)
    {

        $method_route = $routeMethodAttribute->newInstance();
        $method_route->setClosure($method->getClosure(new HelloController()));
    }
}

foreach (Route::getRoutes() as $route){
    $path = $route->getPath();

    echo '<pre>' . var_export($path, true) . '</pre>';

    echo '<pre>' . var_export($_GET['path'], true) . '</pre>';
    echo '<pre>' . var_export( '#^'.$path.'$#', true) . '</pre>';

    echo '<pre>' . var_export(preg_match_all('#^'.$path.'$#', "/".$_GET['path'], $matches), true) . '</pre>';

    echo '<pre>' . var_export($matches, true) . '</pre>';

}

//echo '<pre>' . var_export(Route::getRoutes(), true) . '</pre>';

//$test = $_GET['path'];

//echo '<pre>' . var_export($test, true) . '</pre>';

$get_explode = explode('/', $_GET['url'] ?? null);







echo '<pre>' . var_export(Route::getRoutes(), true) . '</pre>';

echo '<pre>' . var_export($get_explode, true) . '</pre>';






foreach (Route::getRoutes() as $route)
{
    $path_exploded = explode('/', $route->getPath());







    //echo '<pre>' . var_export(explode('/', $route->getPath()), true) . '</pre>';
}*/

