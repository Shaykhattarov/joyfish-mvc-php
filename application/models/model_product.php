<?php

class Model_Product extends Model
{
    private $con;

    function __construct()
    {
        $this->con = $this->database_connection();
    }

    function get_data($id)
    {
        $data = [];

        $con = $this->database_connection();

        $product_info = $this->get_product_info($id)[0];
        $attributes_value = $this->get_product_attributes($id);

        for ($i = 0; $i < count($attributes_value); $i++) {
            $attribute_id = $attributes_value[$i]["attribute_id"];
            $attributes_info = $this->get_attribute_info($attribute_id);
            
            for ($y = 0; $y < count($attributes_info); $y++) {
                if ($attribute_id == $attributes_info[$y]["id"]) {
                    
                    $index = $attributes_info[$y]["code"];
                    
                    $data["product"]["attribute"][$index]["name"] = $attributes_info[$y]["name"];
                    $data["product"]["attribute"][$index]["type"] = $attributes_info[$y]["type"];
                    $type = $attributes_info[$y]["type"];
                    if ($type == 'images') {
                        $data["product"]["attribute"][$index]["value"] = explode(',', $attributes_value[$i]["value_$type"]);
                    }
                    $data["product"]["attribute"][$index]["value"] = $attributes_value[$i]["value_$type"];
                }
                
            }
        }

        $data["product"]["name"] = $product_info["name"];
        $data["product"]["articul"] = $product_info["articul"];
        $data["product"]["price"] = number_format($product_info["price"], 0, ',', ' ');
        $data["product"]["in_stock"] = $product_info["in_stock"];

        

        return $data;
    }

    private function get_product_info($id)
    {
        $data = [];
        $sql = "SELECT * FROM catalog_product WHERE `id`=$id";

        $result = $this->database_query($this->con, $sql);

        if (isset($result) && mysqli_num_rows($result) > 0) {
            foreach ($result as $row) {
                array_push($data, $row);
            }
            return $data;
        } else {
            return false;
        }
    }

    private function get_product_attributes($id)
    {
        $data = [];
        $sql = "SELECT `id`, `attribute_id`, `value_text`, `value_integer`, `value_boolean`, `value_float`, `value_date` FROM catalog_prodattributevalue WHERE `product_id`=$id;";

        $result = $this->database_query($this->con, $sql);

        if (isset($result) && mysqli_num_rows($result) > 0) {
            foreach ($result as $row) {
                array_push($data, $row);
            }
            return $data;
        } else {
            return false;
        }
    }

    private function get_attribute_info($id)
    {
        $data = [];
        $sql = "SELECT * FROM catalog_productattribute;";
        $result = $this->database_query($this->con, $sql);

        if (isset($result) && mysqli_num_rows($result) > 0) {
            foreach ($result as $row) {
                array_push($data, $row);
            }
            return $data;
        } else {
            return false;
        }
    }
}
