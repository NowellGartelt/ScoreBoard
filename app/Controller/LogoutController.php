<?php 
// app/Controller/LogoutController.php
class LogoutController extends AppController {	
	public function index(){
		session_start();

		$_SESSION['login'] = false;

		session_destroy();

		$this -> render('index');
	}
}
?>