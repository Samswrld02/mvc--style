<?php
require_once "./Models/seriesModel.php";

$test = "hello lmao";

class HomeController {
    private  $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function get() {
        echo "workss";
        // exit;
        

         $model = new Series($this->conn);
         $databaseArray = $model->get();
        //put data into the view and show view
        require "./views/home.view.php";
    }

    //NOTE!: test method for routing
    public function byId($id) {
        $model = new Series($this->conn);
        $databaseArray = $model->ById($id);
        require "./views/home.view.php";
    }
    
}

$databaseArray = [["title" => "test", "rating" => 1] ,["title" => "the good place", "rating" => 4.5]];

