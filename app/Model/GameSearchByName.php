<!-- /app/Model/GameSearshByName.php-->
<?php
class GameSearchByName{
	private $gamename = '';
	
	public function GameSearchByName($gamename){
		$this->gamename = $gamename;

		$link = mysqli_connect('localhost','root','axcel696','ScoreBoard');
		mysqli_set_charset($link, 'utf8');
		
		$query = "select gamename from gametitletable where gamename = '$gamename'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		$getGameName = $row[0];
		
		if($getGameName === null){
			return true;
		} else {
			return false;
		}
		
		mysqli_close($link);
	}
}