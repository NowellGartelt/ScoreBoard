<?php 
// app/Controller/TopPageController.php
class TopPageController extends AppController {
	
	public function index(){
		session_start();

		include 'tools/judgeIsLogined.php';
		$judgeIsLoginedAction = new judgeIsLogined();
		echo $judgeIsLoginedAction;

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
				$getScore[$i][$j] = isset($_SESSION['recentlyScore'][$i][$j])	? $_SESSION['recentlyScore'][$i][$j] :null;
				
			}
		}
		$this -> render('index');
	}
}
?>