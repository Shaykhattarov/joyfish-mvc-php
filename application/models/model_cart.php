<?php

class Model_Cart extends Model
{

    function save_cookie_data()
    {
        if (isset($_SESSION['cart']) && !isset($_COOKIE['cart'])) {
            $cart_content = serialize($_SESSION['cart']);
            setcookie('cart', $cart_content, time() + 3600 * 24, '/');
            header("Location: /cart");
        }
        if (isset($_COOKIE['cart']) && isset($_SESSION['cart'])) {

            $newcookie = [];
            $oldcookie = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']): null;
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
                $general_id_index = 0;
                $general_id = (-100);
                foreach ($oldcookie as $count => $row) {
                    $id = $row['id'];
                    if ($session['id'] == $id) {
                        $general_id = (int)$id;
                        $general_id_index = $count;
                    }
                }
                if($general_id < 0){
                    $newcookie = unserialize($_COOKIE['cart']);
                    array_push($newcookie, $session);
                } else {
                    $newcookie = unserialize($_COOKIE['cart']);
                    $newcookie[$general_id_index]['count'] = (int)$newcookie[$general_id_index]['count'] + (int)$session['count'];
                    $general_id_index = (-100);
                }
            }
            $cart_content = serialize($newcookie);
            setcookie('cart', $cart_content, time() + 3600 * 24, '/');
            $_COOKIE['cart'] = serialize($newcookie);
            header('Location: /cart');
        }
    }

    function get_data()
    {
        $con = $this->database_connection();
        $data = [];
        $serizalized_cookie = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : null;
        
        if (isset($serizalized_cookie)) {
            $cookie = unserialize($_COOKIE['cart']);
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
