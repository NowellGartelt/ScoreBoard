<?php 
// app/Controller/NewMemberController.php
class NewMemberController extends AppController {
	
	public function index(){
		// メンバー追加ページ
		// メンバー情報を入力する
		session_start();

		include 'tools/judgeIsLogined.php';
		$judgeIsLoginedAction = new judgeIsLogined();

		$this -> render('index');
	}
	
	public function MemberRegist(){
		session_start();

		include 'tools/judgeIsLogined.php';
		$judgeIsLoginedAction = new judgeIsLogined();

		include '../Model/searchMemberByName.php';
		include '../Model/registMember.php';
		
		$name = $_POST['name'] ?? '';
		$userID = $_POST['userID'] ?? '';
		$password = $_POST['password'] ?? '';
		$admin = isset($_POST['isAdmin'])		? 1						: 0;
		
		$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
		$userID = htmlspecialchars($userID, ENT_QUOTES, 'UTF-8');
		$password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
		
		if($name == '' || $userID == '' || $password == ''){
			$_SESSION['errorFlag'] = true;
			
		} else {
			$isRegist = new searchMemberByName($name);
			$getUserName = $_SESSION['getUserName'];

			if($getUserName !== null){
				$_SESSION['isRegistFlag'] = true;

			} else {
				$memberRegistAction = new registMember($name, $userID, $password, $admin);
				echo 'maka';
				
			}
		}
		$this -> render('index');
		
	}
}
?>