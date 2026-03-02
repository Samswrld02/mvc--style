<?php
require_once "./Models/authentication/authentication.model.php";

class Login {
    private $conn;
        //validate login using method
        //-->
        public function __construct($pdoconn) {
            $this->conn = $pdoconn;
        }

        //middleware for controllers
        public static function AuthenticationMiddleWare() {
            if (!isset($_SESSION['user'])) {
                header("Location: " . URLROOT . "/");
                // exit;
            }
        }

        public function verify() {
            $model = new Authentication($this->conn);

            $loginAuthentic = $model->verify($_POST);
            
            if ($loginAuthentic) {
                $_SESSION['user'] = $_POST['username'];
                unset($_SESSION['message']);
                header("Location: " . URLROOT . "/home");
            } else {
                //dislay error message
                $_SESSION['message'] = "INVALID LOGIN!";
                header("Location: " . URLROOT . "/");
            }
        }
    
    public function loginform() {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }

        //generate login form
        // -->
        require_once "./views/login/login.view.php";
    }
}
