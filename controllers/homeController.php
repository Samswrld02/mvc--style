<?php
require_once "./Models/NetlandModel.php";
$test = "hello lmao";

class HomeController {
    private  $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function showAll() {
        echo "works";
        exit;
        

        $netlandModel = new Netland($this->conn);
        //put data into the view and show view
        require "./views/home.view.php";
    }
    
}

$databaseArray = [["title" => "test", "rating" => 1] ,["title" => "the good place", "rating" => 4.5]];

