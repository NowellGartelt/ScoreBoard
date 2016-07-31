<!-- /app/Model/searchMemberCountAll.php-->
<?php
class searchMemberCountAll{
	public function searchMemberCountAll(){
		$getName = array();

		include '../Model/databaseConnect.php';

		$query = "SELECT DISTINCT `gameDate` FROM `gameTable` ORDER BY `gameDate` DESC;";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		
		$i = 0;
		$gameDate = array(); 
		$_SESSION['getAllGameDate'] = array();
		while($gameDate = $row){
			$_SESSION['getAllGameDate'][i] = $gameDate;
			i++;
		}

		mysqli_close($link);
	}
}