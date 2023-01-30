<?php

class Model_Login extends Model {
    
    private $result;

    function check_user() {

        $name = $_POST["name"];
        $login = $_POST["email"];
        $usertype = $_POST["typeuser"];
        $password = md5($_POST["password"]);

        $con = $this->database_connection();
        try {
            $sql = "SELECT * FROM user WHERE `name`='$name' AND `login`='$login' AND `password`='$password' AND `role`='$usertype' ;";
            $this->result = mysqli_query($con, $sql);
        } catch (mysqli_sql_exception $err) {
            error_log($err, 0);
        }

        if (mysqli_num_rows($this->result) == 0) {
            return false;
        }
        else {
            return true;
        }
        
    }
}

