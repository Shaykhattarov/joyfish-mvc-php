<?php

class Controller_Product extends Controller {

    public $model;

    function __construct()
	{
		$this->model = new Model_Product();
		$this->view = new View();
	}

    function action_index() {
        session_start();
        if(isset($_GET["id"]) && !isset($_POST["size"])) {
            
            $id = $_GET["id"];
            
            $data = $this->model->get_data($id);

		    $this->view->generate('product_view.php', 'template_view.php', $data);

        } elseif (isset($_POST["add"]) && isset($_POST["size"]) && isset($_POST["count"])) {
            $_SESSION["product_id"] = $_GET["id"];
            $_SESSION["size"] = $_POST["size"];
            $_SESSION["count"] = $_POST["count"];
            //header("Location: /card");
        } 
        else {
            header("Location: /404");
        }
    }
}