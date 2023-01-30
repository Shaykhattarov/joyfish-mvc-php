<?php

class Controller_Product extends Controller {

    public $model;

    function __construct()
	{
		$this->model = new Model_Product();
		$this->view = new View();
	}

    function action_index() {
        if(isset($_GET["id"])) {
            session_start();
            
            $id = $_GET["id"];
            
            $data = $this->model->get_data($id);

            //var_dump($data);
		    $this->view->generate('product_view.php', 'template_view.php', $data);

        } else {
            header("Location: /404");
        }
    }
}