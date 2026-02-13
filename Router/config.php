<?php

//initialise db connection
$conn = Database::createConnection();

//inject dependancy into class
$test = new Router($conn);

$test->handleRequest();

