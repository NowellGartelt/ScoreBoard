<?php 
// app/Controller/NewGameScoreController.php
class NewGameScoreController extends AppController {
	
	public function index(){
		// 新規ゲームスコア登録ページ
		// 登録済みゲームタイトルを取得
		// チェックボックスで参加メンバーを選択
		session_start();

		include 'tools/judgeIsLogined.php';
		$judgeIsLoginedAction = new judgeIsLogined();

		include 'tools/getInputScoreInfo.php';
		$getInputScoreTnfoAction = new getInputScoreInfo();

		$displayYear = $_SESSION['displayYear'];
		$todayMonth = $_SESSION['todayMonth'];
		$todayDay = $_SESSION['todayDay'];
		$gameTitle = $_SESSION['getAllGameTitle'];
		$member = $_SESSION['getAllMember'];

		$this->set('displayYear',$displayYear);
		$this->set('todayMonth',$todayMonth);
		$this->set('todayDay',$todayDay);
		$this->set('gameTitle',$gameTitle);
		$this->set('member',$member);

		$this -> render('index');
	}
	
	public function MemberScoreRegist(){
		// 参加メンバーを選択
		session_start();

		include 'tools/judgeIsLogined.php';
		$judgeIsLoginedAction = new judgeIsLogined();

		include '../Model/searchMemberByID.php';
		include 'tools/getInputScoreInfo.php';
		include '../Model/searchGameByGameId.php';

		$_SESSION['year_NewScore'] = $_POST['year'];
		$_SESSION['month_NewScore'] = $_POST['month'];
		$_SESSION['day_NewScore'] = $_POST['day'];
		$_SESSION['gameno_NewScore'] = $_POST['gameno'];
		$_SESSION['gametitle_NewScore'] = $_POST['gametitle'];

		$member = $_POST['member'] ?? '';
		$gameID = $_SESSION['year_NewScore'].$_SESSION['month_NewScore'].$_SESSION['day_NewScore'].$_SESSION['gameno_NewScore'];
		$isGameSearchAction = new searchGameByGameId($gameID);

		if ($member == '' || $isGameSearchAction !== '') {
			if ($member == '') {
				$_SESSION['errorFlag'] = true;
			} elseif ($isGameSearchAction !== '') {
				$_SESSION['isRegistFlag'] = true;
			}

			$getInputScoreInfoAction = new getInputScoreInfo();

			$displayYear = $_SESSION['displayYear'];
			$todayMonth = $_SESSION['todayMonth'];
			$todayDay = $_SESSION['todayDay'];
			$gameTitle = $_SESSION['getAllGameTitle'];
			$member = $_SESSION['getAllMember'];

			$this->set('displayYear',$displayYear);
			$this->set('todayMonth',$todayMonth);
			$this->set('todayDay',$todayDay);
			$this->set('gameTitle',$gameTitle);
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

			$_SESSION['gameid'] = $gameid;

			$this->set('entryMember',$entryMember);
			$this->set('entryMemberName',$entryMemberName);

			$this -> render('score_input');

		}
	}

	public function ScoreRegist(){
		// 参加メンバーを選択
		session_start();

		include 'tools/judgeIsLogined.php';
		$judgeIsLoginedAction = new judgeIsLogined();


		include '../Model/registScore.php';
		include '../Model/registGame.php';
		include '../Model/searchMemberCountAll.php';
		include 'tools/getInputScoreInfo.php';

		$gameId = $_SESSION['gameid'];
		$gameTitle = $_SESSION['gametitle_NewScore'];
		$userId = 0;
		$gameTitleId = 0;
		
		if($gameTitle === "スクールアイドル大作戦"){
			$gameTitleId = 1;
		} elseif($gameTitle === "スクールアイドルコレクション") {
			$gameTitleId = 2;
		}
		
		$gameDate = $_SESSION['year_NewScore'].$_SESSION['month_NewScore'].$_SESSION['day_NewScore'];
		$gameNo = $_SESSION['gameno_NewScore'];
		$registDate = date("YmdHis");

		$getMemberCountAllAction = new searchMemberCountAll();

		$gameEntry = $_SESSION['getAllMemberCount'];
		
		$registGameAction = new registGame($gameId, $gameTitleId, $gameDate, $gameNo, $gameEntry, $registDate);

		for($countMember = 1;$countMember <= $gameEntry; $countMember++){
			$Member = sprintf('%02d', $countMember);
			$score['score'][$countMember] = isset($_POST['score'.$Member])	? $_POST['score'.$Member]	: null;
			$score['gamescoreid'][$countMember] = $_SESSION['gameid'].$Member;
			
			$registScoreAction = new registScore($score['gamescoreid'][$countMember], $gameId, $Member, $score['score'][$countMember], $registDate);
			$_SESSION['registResult'] = true;
		}

		$getInputScoreTnfoAction = new getInputScoreInfo();

		$displayYear = $_SESSION['displayYear'];
		$todayMonth = $_SESSION['todayMonth'];
		$todayDay = $_SESSION['todayDay'];
		$gameTitle = $_SESSION['getAllGameTitle'];
		$member = $_SESSION['getAllMember'];

		$this->set('displayYear',$displayYear);
		$this->set('todayMonth',$todayMonth);
		$this->set('todayDay',$todayDay);
		$this->set('gameTitle',$gameTitle);
		$this->set('member',$member);

		$this -> render('index');
	}
}
?>