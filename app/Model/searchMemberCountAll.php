<!-- /app/Model/searchMemberCountAll.php-->
<?php
class searchMemberCountAll{
	public function searchMemberCountAll(){
		$getName = array();

		include '../Model/databaseConnect.php';

		$query = "select count(*) from usertable";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		
		$_SESSION['getAllMemberCount'] = $row[0];

		mysqli_close($link);
	}
}