<?php 
// app/Controller/LoginController.php
class LoginController extends AppController {	
	public function index(){
		session_start();

		$_SESSION['errorFlag'] = false;
		$_SESSION['loginError'] = false;

		$this -> render('index');
	}

	public function authLogin(){
		// ポストされたログインIDを $loginId 変数に代入する。ポストされた値がなければ null を代入する。
		session_start();

		include '../Model/searchMemberByLogIdAndPass.php';
		include '../Model/searchScoreByDay.php';

		$_SESSION['errorFlag'] = false;
		$_SESSION['loginError'] = false;

		$loginId = $_POST['loginId'] ?? '';
		$loginId = htmlspecialchars($loginId);

		$loginPassword = $_POST['loginPassword'] ?? '';
		$loginPassword = htmlspecialchars($loginPassword);

		if(empty($loginId) || empty($loginPassword)){
			$_SESSION['errorFlag'] = true;
			$this->render('index');

		} else {
			$checkLoginAction = new searchMemberByLogIdAndPass($loginId,$loginPassword);
			$loginError = $_SESSION['loginError'];

			if($loginError == true){
				$this->render('index');

			} else {
				$_SESSION['login'] = 'login';

				$getScoreAction = new searchScoreByDay();
				$getRecentlyGameDate = $_SESSION['recentlyDate'];
				$this->set('recentlyGameDate',$getRecentlyGameDate);

				include_once('TopPageController.php');
				$this->render('../TopPage/index');

			}
		}
	}
}
?>