<?php

class Controller_Card extends Controller
{

	function action_index()
	{
		session_start();
		$this->view->generate('card_view.php', 'template_view.php');
	}
}
