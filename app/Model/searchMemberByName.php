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
		$getUserName = $row[0];

		$_SESSION['getUserName'] = $getUserName;
		
		mysqli_close($link);
	}
}