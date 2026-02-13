<?php

require_once "./Router/routerController.php";
require_once "./Router/config.php";

//check if route exists
if ($test->handleRequest()) {
    var_dump($test->handleRequest()->showAll());
}

