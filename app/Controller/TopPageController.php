<?php 
// app/Controller/ScoreboardController.php
session_start();

class TopPageController extends AppController {
	
	public function index(){
		include '../Model/searchScoreByDay.php';

		session_destroy();
		$_SESSION['entry'] = null;
		$_SESSION['entryMember'] = null;
//		$_SESSION['entryMember']['5'] = null;
//		$_SESSION['recentlyScore']['0']['6'] = null;
		
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
				$getScore[$i][$j] = $_SESSION['recentlyScore'][$i][$j];
				// $this->set('score'[$i][$j],$getScore[$i][$j]);
				// var_dump($getScore[$i][$j]);
				
			}
		}
		$this -> render('index');
	}
}
?>