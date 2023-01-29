<?php

class Controller_Product extends Controller {

    private $data;

    function action_index() {

        $this->data = "";

        session_start();
		$this->view->generate('product_view.php', 'template_view.php', $this->data);
    }
}