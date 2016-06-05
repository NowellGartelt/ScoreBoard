<!-- /app/Model/MemberSearshByName.php-->
<?php
class MemberSearchByName{
	private $username = '';
	
//	public function __construct($username){
	public function MemberSearchByName($username){
		$this->username = $username;

		$link = mysqli_connect('localhost','root','axcel696','ScoreBoard');
		mysqli_set_charset($link, 'utf8');
		
		$query = "select name from usertable where name = '$username'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		$getName = $row[0];
		
//		var_dump($getName);
		
		if($getName === null){
//			$return = 0;
			return true;
		} else {
//			$return = 1;
			return false;
		}
		
//		return 0;
		
		mysqli_close($link);
	}
}