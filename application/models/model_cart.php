<?php

class Model_Cart extends Model
{

    function save_cookie_data()
    {
        if (isset($_SESSION['cart']) && !isset($_COOKIE['cart'])) {
            $cart_content = serialize($_SESSION['cart']);
            setcookie('cart', $cart_content, time() + 3600 * 24, '/');
        }
        if (isset($_COOKIE['cart']) && isset($_SESSION['cart'])) {

            $newcookie = [];
            $oldcookie = unserialize($_COOKIE['cart']);
            $session = $_SESSION['cart'];

            if (isset($oldcookie["id"])) {
                if ($session['id'] != $oldcookie['id']) {
                    array_push($newcookie, $oldcookie);
                    array_push($newcookie, $session);
                } else {
                    $oldcookie['count'] = (string)((int)$oldcookie['count'] + (int)$session['count']);
                    array_push($newcookie, $oldcookie);
                }
            } else {
                foreach ($oldcookie as $row) {
                    $id = $row['id'];
                    if ($session['id'] != $id) {
                        array_push($newcookie, $row);
                    } else {
                        $row['count'] = (string)((int)$row['count'] + (int)$session['count']);
                        array_push($newcookie, $row);
                    }
                }
            }

            $cart_content = serialize($newcookie);
            setcookie('cart', $cart_content, time() + 3600 * 24, '/');
        }
    }

    function get_data()
    {
        $con = $this->database_connection();
        $data = [];
        if (isset($_COOKIE['cart']) || isset($_SESSION['cart'])) {
            $cookie = unserialize($_COOKIE['cart']);
            //var_dump($cookie);
            if (!isset($cookie['id'])) {
                foreach ($cookie as $row) {
                    $id = $row['id'];
                    $sql = "SELECT `name`, `price` FROM catalog_product WHERE id='{$id}'";
                    $result = $this->database_query($con, $sql);
                    if (isset($result) && $result && mysqli_num_rows($result) > 0) {
                        $res = $result->fetch_array(MYSQLI_ASSOC);
                        $data[$id]['name'] = $res['name'];
                        $data[$id]['price'] = $res['price'];
                        $data[$id]['count'] = $row['count'];
                        $data[$id]['size'] = $row['size'];

                        $data[$id]['total_price'] = $data[$id]['price'] * $row['count'];
                    }
                }
                return $data;
            } else {
                $id = $cookie['id'];
                $sql = "SELECT `name`, `price` FROM catalog_product WHERE id='{$id}'";
                $result = $this->database_query($con, $sql);

                if (isset($result) && $result && mysqli_num_rows($result) > 0) {
                    $res = $result->fetch_array(MYSQLI_ASSOC);
                    $data[$id]['name'] = $res['name'];
                    $data[$id]['price'] = $res['price'];
                    $data[$id]['count'] = $cookie['count'];
                    $data[$id]['size'] = $cookie['size'];

                    $data[$id]['total_price'] = $data[$id]['price'] * $cookie['count'];
                }
                return $data;
            }
        }
        return false;
    }
}
