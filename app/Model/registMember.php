<!-- /app/Model/registMember.php-->
<?php
class registMember{
	public function	registMember($username, $password, $admin){
		$this->username = $username;
		$this->password = $password;
		$this->admin = $admin;

		include '../Model/databaseConnect.php';
		
		$query_getId = "select MAX(userid) from usertable";
		$result_getId = mysqli_query($link, $query_getId);
		$row = mysqli_fetch_array($result_getId);
		$getId = $row[0];
		$userId = $getId + 1;
		
		$addDate = date("YmdHis");
		
		$query_add = "insert into usertable (userid, password, name, adddate, updatedate, isAdmin) 
						values (
							'$userId',
							'$password',
							'$username',
							'$addDate',
							null,
							'$admin'
						)";

		$result_add = mysqli_query($link, $query_add);
		if($result_add === false){
			$_SESSION['isRegistFlag'] = true;
		} else {
			$_SESSION['registResult'] = true;
		}
		
		return $result_add;
		
		mysqli_close($link);
	}
}
