<?php 
class Controller_Registration extends Controller
{
	public $model;
	function __construct()
	{
		$this->model = new Model_Registration();
		$this->view = new View();
	}

	function action_index()
	{
		$data["reg_status"] = "-";
		
		if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])) {
			if($this->model->add_user() == false){
				$data["reg_status"] = "Такой пользователь уже существует!";
			}
			else{
				header("Location: /login");
			}
		}
		elseif (!isset($_POST["name"]) && !isset($_POST["email"]) && !isset($_POST["password"])){
			$data["reg_status"] = "-";
		}
		else {
			$data["reg_status"] = "Заполните все поля!";
		}

		$this->view->generate('registration_view.php', 'template_view.php', $data);
	}
	
}