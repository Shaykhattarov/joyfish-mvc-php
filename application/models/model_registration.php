<?php

class Model_Registration extends Model 
{
    function add_user() {
        $name = $_POST["name"];
        $login = $_POST["email"];
        $password = md5($_POST["password"]);

        $con = $this->database_connection();
        try {
            $sql_check_user = "SELECT * FROM user WHERE `login`='$login' AND `password`='$password' ;";
            $result = mysqli_query($con, $sql_check_user);
        } catch (mysqli_sql_exception $err) {
            error_log($err, 0);
        }
        
        if(mysqli_num_rows($result) == 0){
            try {
                $sql = "INSERT INTO user(name, login, password, role) VALUES ('$name', '$login', '$password', 'user') ;";
                $result = mysqli_query($con, $sql);
            } catch (mysqli_sql_exception $err) {
                error_log($err, 0);
                return false;
            }
            return true;
             
        }
        else {
            return false;
        }
    }
}