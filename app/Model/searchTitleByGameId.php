<!-- /app/Model/searchTitleByGameId.php -->
<?php
class searchTitleByGameId{
	public function searchTitleByGameId($gameId){
		$this->gameId = $gameId;

		include '../Model/databaseConnect.php';

		$query = "select gameTitleId from gametable where gameId = '$gameId'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		$getGameTitleId = $row['gameTitleId'];

		$query = "select gamename from gametitletable where gametitleid = '$getGameTitleId'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		$getGameTitle = $row['gamename'];

		$_SESSION['getGameTitle'] = mb_convert_encoding($getGameTitle, "UTF-8");
		
	}
}
?>
