<!-- /app/Model/registScore.php-->
<?php
class registScore{
	public function	registScore($gameScoreId, $gameId, $userId, $score, $registDate){
		$this->gameScoreId = $gameScoreId;
		$this->gameId = $gameId;
		$this->userId = $userId;
		$this->score = $score;
		$this->registDate = $registDate;
		
		include '../Model/databaseConnect.php';

		$queryRegist = "insert into scoretable (scoreId, gameId, userId, score, registDate, updateDate) 
				values (
					'$gameScoreId',
					'$gameId',
					'$userId',
					'$score',
					'$registDate',
					null
				)";

		$resultRegist = mysqli_query($link, $queryRegist);
		if($resultRegist === false){
			$_SESSION['isRegistFlag'] = true;
		} else {
			$_SESSION['registResult'] = true;
		}
		
		return $resultRegist;
		
		mysqli_close($link);
	}
}
?>
