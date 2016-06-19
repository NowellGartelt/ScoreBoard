<?php 
// app/Controller/getInputScoreInfo.php
class getInputScoreInfo{
	public function getInputScoreInfo(){
		include '../Model/searchMemberAll.php';
		include '../Model/searchGameAll.php';

		$_SESSION['getAllMember'] = false;

		$member = array();
		$no = 1;

		$todayYear = date('Y');
		$_SESSION['displayYear'][0] = $todayYear;

		for($yearCount = 1; $yearCount <= 9; $yearCount++){
			$todayYear = $todayYear + 1;
			$_SESSION['displayYear'][$yearCount] = $todayYear;

		}

		$_SESSION['todayMonth'] = date('m');
		$_SESSION['todayDay'] = date('d');

		$getGameTitleAction = new searchGameAll();
		$getMemberNameAction = new searchMemberAll();
	}
}
?>