<!-- /app/Model/MemberSearshByName.php-->
<?php
class MemberSearchByName{
	private $username = '';
	
	public function MemberSearchByName($username){
		$this->username = $username;

		$link = mysqli_connect('localhost','root','axcel696','ScoreBoard');
		mysqli_set_charset($link, 'utf8');
		
		$query = "select name from usertable where name = '$username'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		$getName = $row[0];
		
		if($getName === null){
//			$return = 0;
			return 0;
		} else {
//			$return = 1;
			return 1;
		}
		
//		return $getName;
		
		mysqli_close($link);
	}
}