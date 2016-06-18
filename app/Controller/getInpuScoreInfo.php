<?php 
// app/Controller/tools/getInpuScoreInfo.php
class getInpuScoreInfo{
	public function getInpuScoreInfo(){
		session_start();

		include '../../Model/searchMemberAll.php';
		include '../../Model/searchGameAll.php';

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

		var_dump($_SESSION['todayMonth']);
		var_dump($_SESSION['todayDay']);

		$getGameTitleAction = new searchGameAll();
		$getMemberNameAction = new searchMemberAll();
	}
	
	public function MemberScoreRegist(){
		// 参加メンバーを選択
		session_start();

		include '../Model/searchMemberByID.php';

		$_SESSION['year_NewScore'] = $_POST['year'];
		$_SESSION['month_NewScore'] = $_POST['month'];
		$_SESSION['day_NewScore'] = $_POST['day'];
		$_SESSION['gameno_NewScore'] = $_POST['gameno'];
		$_SESSION['gametitle_NewScore'] = $_POST['gametitle'];

		$member = isset($_POST['member'])	? $_POST['member']	: null;

		if ($member == null) {
			include '../Model/searchMemberAll.php';
			include '../Model/searchGameAll.php';

			$_SESSION['errorFlag'] = true;

			$member = array();
			$no = 1;

			$todayYear = date('Y');
			$displayYear[0] = $todayYear;

			for($yearCount = 1; $yearCount <= 9; $yearCount++){
				$todayYear = $todayYear + 1;
				$displayYear[$yearCount] = $todayYear;

			}

			$todayMonth = date('m');
			$todayDay = date('d');

			$this->set('displayYear',$displayYear);
			$this->set('todayMonth',$todayMonth);
			$this->set('todayDay',$todayDay);

			$getGameTitleAction = new searchGameAll();
			$gameTitle = $_SESSION['getAllGameTitle'];

			$this->set('gameTitle',$gameTitle);

			$getMemberNameAction = new searchMemberAll();
			$member = $_SESSION['getAllMember'];

			$this->set('member',$member);

			$this -> render('index');

		} else {
			$countMember = 0;
			$entryMember = array();
			$entryMemberName = array();

			foreach ($_POST['member'] as $memberNo) {
				$entryMember[$countMember] = $_POST['member'][$countMember];
				$getMemberNameAction = new searchMemberByID($entryMember[$countMember]);
				$entryMemberName[$countMember] = $_SESSION['getMemberName'];

				$countMember++;
			}

			$gameid = $_SESSION['year_NewScore'].$_SESSION['month_NewScore'].$_SESSION['day_NewScore'].$_SESSION['gameno_NewScore'];
			$_SESSION['gameid'] = $gameid;

			$this->set('entryMember',$entryMember);
			$this->set('entryMemberName',$entryMemberName);

			$this -> render('score_input');

		}
	}

	public function ScoreRegist(){
		// 参加メンバーを選択
		session_start();

		include '../Model/registScore.php';
		include '../Model/registGame.php';
		include '../Model/searchMemberCountAll.php';

		$gameId = $_SESSION['gameid'];
		$gameTitle = $_SESSION['gametitle_NewScore'];
		$userId = 0;
		$gameTitleId = 0;
		
		var_dump($gameTitle);

		if($gameTitle === "スクールアイドル大作戦"){
			$gameTitleId = 1;
		} elseif($gameTitle === "スクールアイドルコレクション") {
			$gameTitleId = 2;
		}
		
		$gameDate = $_SESSION['year_NewScore'].$_SESSION['month_NewScore'].$_SESSION['day_NewScore'];
		$gameNo = $_SESSION['gameno_NewScore'];
		$registDate = date("YmdHis");

//		var_dump($gameDate);
//		var_dump($gameNo);
//		var_dump($_SESSION['gameid']);

		var_dump($_SESSION['year_NewScore']);
		var_dump($_SESSION['month_NewScore']);
		var_dump($_SESSION['day_NewScore']);
		var_dump($_SESSION['gameno_NewScore']);

		$getMemberCountAllAction = new searchMemberCountAll();

		$gameEntry = $_SESSION['getAllMemberCount'];
		
		$registGameAction = new registGame($gameId, $gameTitleId, $gameDate, $gameNo, $gameEntry, $registDate);

		for($countMember = 1;$countMember <= $gameEntry; $countMember++){
			$Member = sprintf('%02d', $countMember);
			$score['score'][$countMember] = isset($_POST['score'.$Member])	? $_POST['score'.$Member]	: null;
			$score['gamescoreid'][$countMember] = $_SESSION['gameid'].$Member;
			
			$registScoreAction = new registScore($score['gamescoreid'][$countMember], $gameId, $Member, $score['score'][$countMember], $registDate);
			$_SESSION['registResult_NewScore'] = true;
		}

		$this -> render('index');
	}
}
?>