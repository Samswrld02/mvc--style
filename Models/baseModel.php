<?php

class baseModel {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function get($resource) {
        
        try {
            $conn = $this->conn;
            //  var_dump($conn);
            //  exit;
            $sql = "SELECT * FROM {$resource}";
            

            $stmt = $conn->query($sql);
            // var_dump($stmt);
            // exit;
            $result = $stmt->fetchALL();

            // var_dump($result);
            
        
        return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function ById($resource, $id) {
        $conn = $this->conn;
        $id = intval($id);
    

        $sql = "SELECT * FROM  {$resource} WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->execute(["id"=>$id]);
        $result = $stmt->fetchALL();

        return $result;
    }

    public function order($resource, $title, $dir) {
        $conn = $this->conn;

        $sql = "SELECT * FROM $resource ORDER BY $title $dir";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();
        
        return $result;
        
    }

    //get data for edit form
    public function display($resource, $id) {
        $conn = $this->conn;
        

        $sql = "SELECT * FROM $resource WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->execute(["id"=>$id]);

        return $stmt->fetchAll();
    }

    //update data based on form input
    public function update($resource, $dataArray, $id) {
        $conn = $this->conn;
        $substringContainer = [];

        //loop through array

        foreach ($dataArray as $key => $value) {
            $substring = "$key = :$key";
            array_push($substringContainer, $substring);
        }
        // var_dump($substringContainer);
        $preparedStatement = implode(", ", $substringContainer);

        $dataArray['id'] = intval($id);

        // var_dump($dataArray);
       

        $sql = "UPDATE $resource SET $preparedStatement WHERE id = :id";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($dataArray);

        return ["result" => "update successful"];
    }
}


