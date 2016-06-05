<?php 
// app/Controller/NewgameController.php
session_start();

class NewgameController extends AppController {
	
	public function index(){
		// 新規ゲーム登録ページ
		// ゲームタイトル、メモを入力
		$_SESSION['errorFlag_NewGame'] = false;
		$_SESSION['isRegistFlag_NewGame'] = false;
		$_SESSION['registResult_NewGame'] = false;

		$this -> render('index');
	}
	
	public function NewGameRegist(){
		include '../Model/GameSearchByName.php';
		include '../Model/GameAdd.php';

		$_SESSION['errorFlag_NewGame'] = false;
		$_SESSION['isRegistFlag_NewGame'] = false;
		$_SESSION['registResult_NewGame'] = false;

		$gamename = isset($_POST['gamename'])	? $_POST['gamename']	: null;
		$gamememo = isset($_POST['gamememo'])	? $_POST['gamememo']	: null;
		
		$gamename = htmlspecialchars($gamename, ENT_QUOTES, 'UTF-8');
		$gamememo = htmlspecialchars($gamememo, ENT_QUOTES, 'UTF-8');
		
		if($gamename == null){
			$_SESSION['errorFlag_NewGame'] = true;
		} else {
			$isRegist = new GameSearchByName($gamename);

			if($isRegist == false){
				$_SESSION['isRegistFlag_NewGame'] = true;
				
			} else {
				$gameAdd = new GameAdd($gamename, $gamememo);
				
			}
		}
		$this -> render('index');
		
	}
}
?>