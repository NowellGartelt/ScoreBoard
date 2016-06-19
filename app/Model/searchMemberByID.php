<!-- /app/Model/searchMemberByID.php-->
<?php
class searchMemberByID{
	private $memberID = '';
	
	public function searchMemberByID($memberID){
		$this->memberID = $memberID;

		$link = mysqli_connect('localhost','iinchou','meganekko','ScoreBoard');
		mysqli_set_charset($link, 'utf8');
		
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