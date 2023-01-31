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
            $_SESSION["product_id"] = $id;

            $data = $this->model->get_data($id);

		    $this->view->generate('product_view.php', 'template_view.php', $data);

        } elseif (isset($_GET["add"]) && isset($_GET["size"]) && isset($_GET["count"])) {
            $_SESSION['add'] = $_GET['add'];
            $_SESSION['cart']["id"] = $_SESSION['product_id'];
            $_SESSION['cart']["size"] = $_GET['size'];
            $_SESSION['cart']["count"] = $_GET['count'];
            //var_dump( $_SESSION);
            unset($_SESSION['product_id']);
            //unset($_SESSION['cart']);
            header("Location: /cart");
        } 
        else {
            header("Location: /404");
        }

        if(isset($_POST['fio']) && isset($_POST['mail']) && isset($_POST['link'])){
            $this -> model -> save_lowprice_msg($_POST['fio'], $_POST['mail'], $_POST['link']);
            $id = $_GET['id'];
            //
        }
    }
}