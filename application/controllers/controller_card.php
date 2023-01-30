<?php

class Controller_Card extends Controller
{

	function action_index()
	{
		session_start();
		#var_dump($_SESSION);
		if (isset($_SESSION["product_id"])) {
			$data["id"] = $_SESSION["product_id"];
			$data["size"] = $_SESSION["size"];
			if ($_SESSION["count"] >= 1 && $_SESSION["count"] <= 100) {
				$data["count"] = $_SESSION["count"];
			}

			$this->view->generate('card_view.php', 'template_view.php', $data);
		} else {
			$this->view->generate('card_view.php', 'template_view.php');
		}
	}
}
