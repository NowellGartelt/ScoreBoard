<?php 
// app/Controller/ScoreboardController.php
class TopPageController extends AppController {
	
	public function index(){
		session_start();

		include '../Model/searchScoreByDay.php';

		$_SESSION['entry'] = null;
		$_SESSION['entryMember'] = null;
		$_SESSION['errorFlag'] = null;
		$_SESSION['isRegistFlag'] = null;
		$_SESSION['registResult'] = null;
		
		$getEntryMember = array();
		$getEntry = 0;
		$getScore = array();
		$recentlyGameDate = "";

		$getScoreAction = new searchScoreByDay();
		
		$getRecentlyGameDate = $_SESSION['recentlyDate'];
		$this->set('recentlyGameDate',$getRecentlyGameDate);
		
		$getEntry = $_SESSION['entry'];		
		for($i = 0; $i < $getEntry; $i++){
			$getEntryMember[$i] = $_SESSION['entryMember'][$i];
			
		}
		
		$getGameCount = $_SESSION['gameCount'];
		for($i = 1; $i <= $getGameCount; $i++){
			for($j = 1; $j <= $getEntry; $j++){
//				$getScore[$i][$j] = $_SESSION['recentlyScore'][$i][$j];
				$getScore[$i][$j] = isset($_SESSION['recentlyScore'][$i][$j])	? $_SESSION['recentlyScore'][$i][$j] :null;
				// $this->set('score'[$i][$j],$getScore[$i][$j]);
//				var_dump($getScore[$i][$j]);
				
			}
		}
		$this -> render('index');
	}
}
?>