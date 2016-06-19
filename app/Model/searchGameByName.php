<!-- /app/Model/searshGameByName.php-->
<?php
class searchGameByName{
	private $gameName = '';
	
	public function searchGameByName($gameName){
		$this->gameName = $gameName;

		include '../Model/databaseConnect.php';

		$query = "select gamename from gametitletable where gamename = '$gameName'";
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