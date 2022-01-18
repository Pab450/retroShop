<?php

$path = $_GET['path'] ?? '';

include_once 'database.php';

switch ($path) {
    case 'value':
        var_dump("hello world");
        break;
    
    default:
        var_dump("error 404");
        break;
}