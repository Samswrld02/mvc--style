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
    // var_dump($routeData["route"]);

    $controller = $routeData["route"]["controller"];
    $method = $routeData["route"]["method"];

    //ID CAN ALSO be column for direction sorting
    $id = $routeData["sub"]["id"] ?? null;
    $resource = $routeData["sub"]["resource"] ?? null;
    $dir = $_GET["dir"] ?? NULL;
    // var_dump($dir);
    

    //header
    try {

    
    require_once "./views/components/BasicViewLayout/header.php";
    $controller->$method($resource, $id, $dir);
    require_once "./views/components/BasicViewLayout/footer.php";
    } catch (throwable $e) {
        echo $e->getMessage();
    }
}

