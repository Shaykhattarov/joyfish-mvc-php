<?php

class Controller_Logout extends Controller
{ 	

	function action_index() {
        session_start();
        unset($_SESSION);
        session_destroy();
        header("Location: /login");    
    }
}
