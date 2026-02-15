<?php

require_once "./Router/routerController.php";
require_once "./Router/config.php";
// require_once "./Models/seriesModel.php";


//inject dependancy into class
$test = new Router($conn);
//check if route exists

$request = $test->handleRequest();

if ($request) {
    
    $routeData = $request;
    var_dump($routeData);

    $controller = $routeData["route"]["controller"];
    $method = $routeData["route"]["method"];
    $id = $routeData["id"] ?? null;

    var_dump($id);

    $controller->$method($id);
}

