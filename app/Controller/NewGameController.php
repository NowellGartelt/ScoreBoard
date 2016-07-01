<?php 
// app/Controller/NewGameController.php
class NewGameController extends AppController {
	
	public function index(){
		session_start();

		include 'tools/judgeIsLogined.php';
		$judgeIsLoginedAction = new judgeIsLogined();

		$_SESSION['errorFlag'] = false;
		$_SESSION['isRegistFlag'] = false;
		$_SESSION['registResult'] = false;

		$this -> render('index');
	}
	
	public function NewGameRegist(){
		session_start();

		include 'tools/judgeIsLogined.php';
		$judgeIsLoginedAction = new judgeIsLogined();

		include '../Model/searchGameByName.php';
		include '../Model/registGameTitle.php';

		$_SESSION['errorFlag'] = false;
		$_SESSION['isRegistFlag'] = false;
		$_SESSION['registResult'] = false;

		$gameName = isset($_POST['gameName'])	? $_POST['gameName']	: null;
		$gameMemo = isset($_POST['gameMemo'])	? $_POST['gameMemo']	: null;
		
		$gameName = htmlspecialchars($gameName, ENT_QUOTES, 'UTF-8');
		$gameMemo = htmlspecialchars($gameMemo, ENT_QUOTES, 'UTF-8');
		
		if($gameName == null){
			$_SESSION['errorFlag'] = true;
		} else {
			$isRegist = new searchGameByName($gameName);

			if($isRegist == false){
				$_SESSION['isRegistFlag'] = true;
				
			} else {
				$gameRegistAction = new registGameTitle($gameName, $gameMemo);
				$_SESSION['registResult'] = true;
			}
		}
		$this -> render('index');
		
	}
}
?>