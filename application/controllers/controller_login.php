<?php

class Controller_Login extends Controller
{ 	
	public $model;
	
	function __construct()
	{
		$this->model = new Model_Login();
		$this->view = new View();
	}

	function action_index() {
		$data["login_status"] = "-";
		if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])) {
			if (!$this -> model -> check_user()){
				$data["login_status"] = "Введены неверные данные!";
			}
			else {
				session_start();
				$_SESSION["login"] = $_POST["email"];
				$_SESSION["name"] = $_POST["name"];
				$_SESSION["role"] = $_POST["typeuser"];
				header("Location: /");
			}
		}
		elseif(!isset($_POST["name"]) && !isset($_POST["email"]) && !isset($_POST["password"])) {
			$data["login_status"] = "-";
		}
		else {
			$data["login_status"] = "Заполните все поля!";
		}

		$this->view->generate('login_view.php', 'template_view.php', $data);	
	}
}
