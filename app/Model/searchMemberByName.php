<!-- /app/Model/searshMemberByName.php-->
<?php
class searchMemberByName{
	private $username = '';
	
	public function searchMemberByName($username){
		$this->username = $username;

		include '../Model/databaseConnect.php';

		$query = "select name from usertable where name = '$username'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		$getName = $row[0];
		
		if($getName === null){
			return true;
		} else {
			return false;
		}
		mysqli_close($link);
	}
}