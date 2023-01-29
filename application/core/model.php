<?php

class Model
{
	
	/*
		Модель обычно включает методы выборки данных, это могут быть:
			> методы нативных библиотек pgsql или mysql;
			> методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
			> методы ORM;
			> методы для работы с NoSQL;
			> и др.
	*/

	

	// метод выборки данных
	public function database_query()
	{
		//todo
	}

	function database_connection() {
		$database_link = mysqli_connect(HOST, USER, PASSWORD, NAME_DB);

		if (!$database_link) {
			error_log("[FATAL] Подключение к MySQL неуспешно!");
			exit();
		}
		else {
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			mysqli_set_charset($database_link, "utf8");
		}
		return $database_link;
	}

}