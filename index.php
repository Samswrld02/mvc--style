<?php
require_once "./Database/DatabaseClass.php";
require_once "./controllers/homeController.php";

//create database instance
$conn = Database::createConnection();

$test = new HomeController($conn);

//do this based on route and map controller class and function to it.
$test->showAll();
