<?php

class Controller_Catalog extends Controller
{
	private $data;
	public $model;

	function __construct()
	{
		$this->model = new Model_Catalog();
		$this->view = new View();
	}

	private function sort_array($param = null)
	{
		if ($param == "name") {
			function cmp($a, $b)
			{
				return strnatcmp($a["name"], $b["name"]);
			}
			return uasort($this->data["catalog"], "cmp");
		}
		if ($param == "price") {
			function cmp($a, $b)
			{
				return strnatcmp($a["price"], $b["price"]);
			}
			return uasort($this->data["catalog"], "cmp");
		}
		if ($param == "sale") {
			function cmp($a, $b)
			{
				return strnatcmp($a["name"], $b["name"]);
			}
			return uasort($this->data["catalog"], "cmp");
		}
		if ($param == null) {
			return true;
		}
	}

	function action_index()
	{
		session_start();

		$this->data["catalog"] = $this->model->get_catalog_data();
		$this->data["brand"] = $this->model->get_brand_list();

		if (isset($_GET["sort"])) {
			// сортировка по пункту
			$this->sort_array($_GET["sort"]);
		}

		if (isset($this->data) && $this->data) {
			$this->view->generate('catalog_view.php', 'template_view.php', $this->data);
		} else {
			error_log("[INFO] Not Found Elements In Catalog", 0);
		}
	}
}
