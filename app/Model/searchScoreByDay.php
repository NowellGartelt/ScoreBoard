<!-- /app/Model/searshScoreByday.php-->
<?php
class searchScoreByDay{
	public function searchScoreByDay(){
		include '../Model/searchTitleByGameId.php';
		include '../Model/searchGameByGameId.php';
		
		$getScore = array();
		$getName = array();
		$getEntryMember = "";

		$link = mysqli_connect('localhost','iinchou','meganekko','ScoreBoard');
		mysqli_set_charset($link, 'utf8');
		
		$query = "select MAX(gameDate) from gametable";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		$getRecentlyDate = $row[0];
		$_SESSION['recentlyDate'] = $getRecentlyDate;

		$query = "select MAX(gameNo) from gametable where gameDate = '$getRecentlyDate'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		$getGameCount = $row[0];
		$_SESSION['gameCount'] = $getGameCount;
		
		$query = "select name from usertable order by userid";
		$result = mysqli_query($link, $query);
		
		$i = 0;
		while($row = mysqli_fetch_array($result)){
			$getName[$i] = $row;
			$_SESSION['entryMember'][$i] = $getName[$i]['name'];
			$i++;
			
		}
		
		for($countGame = 1; $countGame <= $getGameCount; $countGame++){
			$Game = sprintf('%02d', $countGame);
			
			$getRecentlyDate = str_replace('-', '', $getRecentlyDate);
			$getGameId = $getRecentlyDate.$Game;
			
			$isGameSearchAction = new searchGameByGameId($getGameId);

//			var_dump($isGameSearchAction);

			if($isGameSearchAction !== null){
				$getGameTitleAction = new searchTitleByGameId($getGameId);

				$getGameTitle = $_SESSION['getGameTitle'];
				$_SESSION['gameTitle'][$countGame] = $getGameTitle;
				
				$query = "select MAX(userId) from scoretable where gameId = '$getGameId'";
				$result = mysqli_query($link, $query);
				$row = mysqli_fetch_array($result);
				$getEntry = $row[0];
				$_SESSION['entry'] = $getEntry;
				
				for($countMember = 1; $countMember <= $getEntry; $countMember++){
					$Member = sprintf('%02d', $countMember);
					$setScoreId = $getGameId.$Member;
					
					$query = "select userId, score from scoretable where scoreId = '$setScoreId'";
					$result = mysqli_query($link, $query);
					$row = mysqli_fetch_array($result);
					$getScore[$countGame][$countMember] = $row['score'];
					$_SESSION['recentlyScore'][$countGame][$countMember] = $getScore[$countGame][$countMember];
			
				}
			}
		}
	}
}
?>
