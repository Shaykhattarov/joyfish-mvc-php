<?php

class Model_Catalog extends Model {

    private $result;
    private $data = [];
    
    public function get_catalog_data() {
        $con = $this->database_connection();
        
        $sql = "SELECT catalog_product.`id`, `name`, `price`, `articul`, `in_stock`, catalog_prodattributevalue.`value_text` FROM catalog_product LEFT OUTER JOIN catalog_prodattributevalue 
        ON catalog_product.id = catalog_prodattributevalue.product_id WHERE catalog_prodattributevalue.attribute_id = 1;";

        try {
            $this -> result = mysqli_query($con, $sql);
        } catch (mysqli_sql_exception $err) {
            error_log($err, 0);
        }
        
        if (isset($this->result) && mysqli_num_rows($this->result) > 0) {
            foreach($this -> result as $row) {
                $row["price"] = number_format($row['price'], 0, ',', ' ');
                $row["brand"] = $row['value_text'];
                unset($row["value_text"]);
                array_push($this->data, $row);
            }
            return $this->data;
        }
        elseif(!isset($this->result)){
            return false;
        }
        else {
            return null;
        }
    }

    public function get_brand_list() {
        $con = $this->database_connection();
        $data = [];

        $sql = "SELECT `value_text` FROM catalog_prodattributevalue WHERE `attribute_id`= '1' ;";

        try {
            $result = mysqli_query($con, $sql);
        } catch (mysqli_sql_exception $err) {
            error_log($err, 0);
        }

        if (isset($result) && mysqli_num_rows($result) > 0) {
            foreach($result as $row) {
                array_push($data, $row);
            }
            return $data;
        }
    }
}