<?php 
// app/Controller/NewMemberController.php
session_start();

class NewMemberController extends AppController {
	
	public function index(){
		// メンバー追加ページ
		// メンバー情報を入力する
		$_SESSION['errorFlag'] = false;
		$_SESSION['isRegistFlag'] = false;
		$_SESSION['registResult'] = false;

		$this -> render('index');
	}
	
	public function memberAdd(){
		include '../Model/MemberSearchByName.php';
		include '../Model/MemberAdd.php';

		$_SESSION['errorFlag'] = false;
		$_SESSION['isRegistFlag'] = false;
		$_SESSION['registResult'] = false;
		
		$name = isset($_POST['name'])			? $_POST['name']		: null;
		$password = isset($_POST['password'])	? $_POST['password']	: null;
		$admin = isset($_POST['isAdmin'])		? 1						: 0;
		
		$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
		$password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
		
		if($name == null || $password == null){
			$_SESSION['errorFlag'] = true;
			
		} else {
			$isRegist = new MemberSearchByName($name);

			if($isRegist == false){
				$_SESSION['isRegistFlag'] = true;
				
			} else {
				$memberAdd = new MemberAdd($name, $password, $admin);
				
			}
		}
		$this -> render('index');
		
	}
}
?>