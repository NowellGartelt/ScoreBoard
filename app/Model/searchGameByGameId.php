<!-- /app/Model/searshGameByGameId.php-->
<?php
class searchGameByGameId{
	public function searchGameByGameId($gameId){
		$this->gameId = $gameId;

		$link = mysqli_connect('localhost','iinchou','meganekko','ScoreBoard');
		mysqli_set_charset($link, 'utf8');
		
		$query = "select * from gametable where gameId = '$gameId'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		$isGame = $row[0];

		return $isGame;
	}
}
?>