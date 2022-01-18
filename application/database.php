<?php

$contents = @file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "database.json");
$json = json_decode($contents, true);

if($json){
    $mysqli = new mysqli(...$json);
}
