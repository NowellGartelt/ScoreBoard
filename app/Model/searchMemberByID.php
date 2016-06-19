<!-- /app/Model/searchMemberByID.php-->
<?php
class searchMemberByID{
	private $memberID = '';
	
	public function searchMemberByID($memberID){
		$this->memberID = $memberID;

		include '../Model/databaseConnect.php';

		$query = "select name from usertable where userid = '$memberID'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		$getName = $row[0];

		$_SESSION['getMemberName'] = $getName;

//		var_dump($getName);
		
		if($getName === null){
			return true;
		} else {
			return false;
		}
		mysqli_close($link);
	}
}