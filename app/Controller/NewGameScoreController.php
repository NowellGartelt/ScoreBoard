<!-- app/Controller/NewGameScoreController.php -->
<?php 
<<<<<<< Updated upstream
session_start();
=======
// session_start();
>>>>>>> Stashed changes

class NewGameScoreController extends AppController {
	public function index(){
		// 新規ゲームスコア登録ページ
		// 登録済みゲームタイトルを取得
		// チェックボックスで参加メンバーを選択
		include '../Model/searchMemberAll.php';
<<<<<<< Updated upstream
=======
		include '../Model/searchGameAll.php';
>>>>>>> Stashed changes

		$_SESSION['errorFlag_NewScore'] = false;
		$_SESSION['isRegistFlag_NewScore'] = false;
		$_SESSION['registResult_NewScore'] = false;
		$_SESSION['getAllMember'] = false;
<<<<<<< Updated upstream
=======

		$member = array();
		$no = 1;
>>>>>>> Stashed changes

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

<<<<<<< Updated upstream
		$getMemberNameAction = new searchMemberAll();
=======
		$getGameTitleAction = new searchGameAll();
		$gameTitle = $_SESSION['getAllGameTitle'];

		$this->set('gameTitle',$gameTitle);

		$getMemberNameAction = new searchMemberAll();
		$member = $_SESSION['getAllMember'];

		$this->set('member',$member);
>>>>>>> Stashed changes

		$this -> render('index');
	}
	
	public function MemberScoreRegist(){
		include '../Model/searchMemberByID.php';

		// 参加メンバーを選択
		// $_SESSION['errorFlag_NewScore'] = false;
		$_SESSION['isRegistFlag_NewScore'] = false;
		$_SESSION['registFlag_NewScore'] = false;
		$_SESSION['registResult_NewScore'] = false;

		$_SESSION['year_NewScore'] = $_POST['year'];
		$_SESSION['month_NewScore'] = $_POST['month'];
		$_SESSION['day_NewScore'] = $_POST['day'];
		$_SESSION['gameno_NewScore'] = $_POST['gameno'];
		$_SESSION['gametitle_NewScore'] = $_POST['gametitle'];

		$member = isset($_POST['member'])	? $_POST['member']	: null;

		if ($member == null) {
			include '../Model/searchMemberAll.php';
			include '../Model/searchGameAll.php';

			 $_SESSION['errorFlag_NewScore'] = true;
			$_SESSION['isRegistFlag_NewScore'] = false;
			$_SESSION['registResult_NewScore'] = false;
			$_SESSION['getAllMember'] = false;

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
		include '../Model/registScore.php';
		include '../Model/registGame.php';

		$gameId = $_SESSION['gameid'];
		$gameTitle = $_SESSION['gametitle_NewScore'];
		$userId = 0;
		$gameTitleId = 0;
		
		if($gameTitle === "ラブライブ！ボードゲーム ファン獲得スクールアイドル大作戦！"){
			$gameTitleId = 1;
		} elseif($gameTitle === "ラブライブ！スクールアイドルコレクション") {
			$gameTitleId = 2;
		}
		
		$gameDate = $_SESSION['year_NewScore'].$_SESSION['month_NewScore'].$_SESSION['day_NewScore'];
		$gameNo = $_SESSION['gameno_NewScore'];

		$link = mysqli_connect('localhost','root','axcel696','ScoreBoard');
		mysqli_set_charset($link, 'utf8');
		
		$query = "select count(*) from usertable";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		
		$gameEntry = $row[0];
		$registDate = date("YmdHis");
		
		$registGame = new registGame($gameId, $gameTitleId, $gameDate, $gameNo, $gameEntry, $registDate);

		for($countMember = 1;$countMember <= $gameEntry; $countMember++){
			$Member = sprintf('%02d', $countMember);
			$score['score'][$countMember] = isset($_POST['score'.$Member])	? $_POST['score'.$Member]	: null;
			$score['gamescoreid'][$countMember] = $_SESSION['gameid'].$Member;
			
			$registScore[$countMember] = new registScore($score['gamescoreid'][$countMember], $gameId, $Member, $score['score'][$countMember], $registDate);
			$_SESSION['registResult_NewScore'] = true;
		}

		$this -> render('index');
	}
}
?>