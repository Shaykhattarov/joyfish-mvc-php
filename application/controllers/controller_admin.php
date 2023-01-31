<?php

class Controller_Admin extends Controller
{
	public $model;

	function __construct() {
		$this -> model = new Model_Admin();
		$this -> view = new View();
	}

	function action_index()
	{
		session_start();

		if($_SESSION['role'] == 'admin' && $this->model->check_admin()) {
			$orders = $this->model->get_orders();
			$lowprice = $this->model->get_lowprice_msg();
			
			$data['orders'] = $orders;
			$data['lowprice'] = $lowprice;
			
			$this -> view -> generate('admin_view.php', 'template_view.php', $data);
		}
		else {
			header("Location: /404");
		}
	}
	
	// Действие для разлогинивания администратора
	function action_logout()
	{
		session_start();
		session_destroy();
		header('Location:/logout');
	}
}
