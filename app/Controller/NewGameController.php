<?php 
// app/Controller/NewGameController.php
session_start();

class NewGameController extends AppController {
	
	public function index(){
		// 新規ゲーム登録ページ
		// ゲームタイトル、メモを入力
		$_SESSION['errorFlag_NewGame'] = false;
		$_SESSION['isRegistFlag_NewGame'] = false;
		$_SESSION['registResult_NewGame'] = false;

		$this -> render('index');
	}
	
	public function NewGameRegist(){
		include '../Model/searchGameByName.php';
		include '../Model/registGameTitle.php';

		$_SESSION['errorFlag_NewGame'] = false;
		$_SESSION['isRegistFlag_NewGame'] = false;
		$_SESSION['registResult_NewGame'] = false;

		$gameName = isset($_POST['gameName'])	? $_POST['gameName']	: null;
		$gameMemo = isset($_POST['gameMemo'])	? $_POST['gameMemo']	: null;
		
		$gameName = htmlspecialchars($gameName, ENT_QUOTES, 'UTF-8');
		$gameMemo = htmlspecialchars($gameMemo, ENT_QUOTES, 'UTF-8');
		
		if($gameName == null){
			$_SESSION['errorFlag_NewGame'] = true;
		} else {
			$isRegist = new searchGameByName($gameName);

			if($isRegist == false){
				$_SESSION['isRegistFlag_NewGame'] = true;
				
			} else {
				$gameRegistAction = new registGameTitle($gameName, $gameMemo);
				
			}
		}
		$this -> render('index');
		
	}
}
?>