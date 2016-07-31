<!-- /app/Model/searshGameByGameId.php-->
<?php
class searchGameByGameId{
	public function searchGameByGameId($gameId){
		$this->gameId = $gameId;

		include '../Model/databaseConnect.php';

		$query = "select * from gametable where gameId = '$gameId'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		$isGame = $row[0];

		$_SESSION['getGameID'] = $isGame;

		return $isGame;
	}
}
?>