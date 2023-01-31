<?

class Model_Admin extends Model
{
    function check_admin()
    {
        $login = $_SESSION['login'];
        $name = $_SESSION['name'];
        $role = $_SESSION['role'];

        $con = $this->database_connection();
        $sql = "SELECT * FROM user WHERE `name`='$name' AND `login`='$login' AND `role`='$role' ;";
        $res = $this->database_query($con, $sql);

        if (isset($res) && mysqli_num_rows($res) == 1) {
            return true;
        } else {
            return false;
        }
    }

    function get_orders()
    {
        $con = $this->database_connection();

        $sql = "SELECT * FROM `order` ;";
        $res = $this->database_query($con, $sql);

        if (isset($res)) {
            $rows = [];
            foreach ($res as $count => $row) {
                $rows[$count] = $row;
                $name = $this->get_username_by_id($row['user_id']);
                $rows[$count]['name'] = $name;
                $prodname = $this->get_prodname_by_id($row['product_id']);
                $rows[$count]['product'] = $prodname;
            }
            return $rows;
        }
        return false;
    }

    function get_lowprice_msg()
    {
        $con = $this->database_connection();
        $sql = "SELECT * FROM `lowprice_contacts` ;";
        $res = $this->database_query($con, $sql);

        if (isset($res)) {
            $data = [];
            foreach($res as $count => $row){
                $data[$count]['name'] = ucfirst(explode(' ', $row['fio'])[1]);
                $data[$count]['email'] = $row['email'];
                $data[$count]['link'] = $row['link'];
            }
            return $data;
        }
        return false;
    }

    private function get_prodname_by_id($id)
    {
        $con = $this->database_connection();
        $sql = "SELECT * FROM catalog_product WHERE `id` = $id;";
        $res = $this->database_query($con, $sql);
        if (isset($res)) {
            $name = $res->fetch_array(MYSQLI_ASSOC)['name'];
            return $name;
        }
    }

    private function get_username_by_id($id)
    {
        $con = $this->database_connection();
        $sql = "SELECT * FROM user WHERE `id` = $id;";
        $res = $this->database_query($con, $sql);
        if (isset($res)) {
            $name = $res->fetch_array(MYSQLI_ASSOC)['name'];
            return $name;
        }
    }
}
