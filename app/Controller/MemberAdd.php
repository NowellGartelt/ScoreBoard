<!-- /app/Model/MemberAdd.php-->
<?php
class MemberAdd{
	public function	MemberAdd($username, $password, $admin){
		$this->username = $username;
		$this->password = $password;
		$this->admin = $admin;

		$link = mysqli_connect('localhost','root','axcel696','ScoreBoard');
		mysqli_set_charset($link, 'utf8');
		
		$query_getId = "select MAX(userid) from usertable";
		$result_getId = mysqli_query($link, $query_getId);
		$row = mysqli_fetch_array($result_getId);
		$getId = $row[0];
		$userId = $getId + 1;
		
		$addDate = date("YmdHis");
		
		$query_add = "insert into usertable (userid, password, name, adddate, updatedate, isAdmin) 
						values (
							$userId,
							$password,
							$username,
							$addDate,
							null,
							$admin
						)";

		$result_add = mysqli_query($link, $query_add);
		
		return $result_add;
		
		mysqli_close($link);
	}
}