<?php

class Controller_Cart extends Controller
{
	public $model;

	function __construct()
	{
		$this->model = new Model_Cart();
		$this->view = new View();
	}

	function action_index()
	{
		session_start();

		if (isset($_GET['clear']) && $_GET['clear'] == 1) {
			$this->clear_cart();
			header("Location: /catalog");
			//$this->view->generate('cart_view.php', 'template_view.php');
		}
		elseif (isset($_SESSION['cart']) && isset($_SESSION['add']) && $_SESSION['add'] == 'cart/add') {
			unset($_SESSION['add']);

			$res = $this->model->save_cookie_data();

			$data = $this->model->get_data();
			
			unset($_SESSION['cart']);
			unset($_SESSION['add']);
			unset($_SESSION["product_id"]);

			//var_dump($data);

			$this->view->generate('cart_view.php', 'template_view.php', $data);
		}
		elseif(!isset($_SESSION['cart']) && isset($_COOKIE['cart']))
		{
			$data = $this->model->get_data();
			
			$this->view->generate('cart_view.php', 'template_view.php', $data);
		} 
		else {
			$this->view->generate('cart_view.php', 'template_view.php');
		}
	}

	function clear_cart()
	{
		unset($_COOKIE['cart']);
		setcookie('cart', '', -1, '/');
		return true;	
	}
}
