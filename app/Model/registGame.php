<!-- /app/Model/registGame.php-->
<?php
class registGame{
	public function	registGame($gameId, $gameTitleId, $gameDate, $gameNo, $gameEntry, $registDate){
		$this->gameId = $gameId;
		$this->gameTitleId = $gameTitleId;
		$this->gameDate = $gameDate;
		$this->gameNo = $gameNo;
		$this->gameEntry = $gameEntry;
		$this->registDate = $registDate;
		
		$link = mysqli_connect('localhost','iinchou','meganekko','ScoreBoard');
		mysqli_set_charset($link, 'utf8');
		
		$queryRegist = "insert into gametable (gameId, gameTitleId, gameDate, gameNo, gameEntry, registDate, updateDate) 
				values (
					'$gameId',
					'$gameTitleId',
					'$gameDate',
					'$gameNo',
					'$gameEntry',
					'$registDate',
					null
				)";

		$resultRegist = mysqli_query($link, $queryRegist);
		if($resultRegist === false){
			$_SESSION['isRegistFlag_NewScore'] = true;
		} else {
			$_SESSION['registResult_NewScore'] = true;
		}
		
		return $resultRegist;
		
		mysqli_close($link);
	}	
}
?>