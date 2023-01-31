<?php

class Model_Formal extends Model
{

    function save_data()
    {
        $cookie = unserialize($_COOKIE['cart']);
        $user_id = $this->get_user_id();
        $date = date("Y-m-d");
        $con = $this->database_connection();

        if (isset($cookie['id'])) {
            var_dump($cookie);
            $prod_id = $cookie['id'];
            $num = rand();

            $count = $cookie['count'];
            //$size = $cookie['size'];
            

            //var_dump($date . ' ' . $count . ' ' . $prod_id . " " . $user_id);
            $sql = "INSERT INTO order(order_date, count, order_num, product_id, user_id) VALUES ('$date', '$count', '$num', '$prod_id', '$user_id') ;";
            $res = $this->database_query($con, $sql);
            return $res;
        } else {
            $num = rand();
            foreach ($cookie as $row) {
                $id = $row['id'];
                $count = $row['count'];
                
                $sql = "INSERT INTO `order` (order_date, count, order_num, product_id, user_id) VALUES ('$date', '$count', '$num', '$id', '$user_id') ;";
                $res = $this->database_query($con, $sql);
                return $res;
            }
        }
    }
    private function get_user_id()
    {
        $name = $_SESSION['name'];
        $login = $_SESSION['login'];

        $con = $this->database_connection();
        $sql = "SELECT * FROM user WHERE `name`='$name' AND `login`='$login';";
        $res = $this->database_query($con, $sql);
        if (isset($res) && mysqli_num_rows($res) == 1) {
            return $res->fetch_array(MYSQLI_ASSOC)['id'];
        } else {
            return false;
        }
    }
}
