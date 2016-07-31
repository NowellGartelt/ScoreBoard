<!-- /app/Model/registMember.php-->
<?php
class registMember{
	public function	registMember($username, $loginID, $password, $admin){
		$this->username = $username;
		$this->loginID = $loginID;		
		$this->password = $password;
		$this->admin = $admin;

		include '../Model/databaseConnect.php';
		
		$query_getId = "select MAX(userid) from usertable";
		$result_getId = mysqli_query($link, $query_getId);
		$row = mysqli_fetch_array($result_getId);
		$getId = $row[0];
		$userId = $getId + 1;
		
		$addDate = date("Y-m-d H:i:s");
		
		$query_add = "insert into usertable (userid, loginId, loginPassword, name, adddate, updatedate, isAdmin) 
						values (
							'$userId',
							'$loginID',
							'$password',
							'$username',
							'$addDate',
							null,
							'$admin'
						)";

		$result_add = mysqli_query($link, $query_add);

		var_dump($result_add);

		if($result_add == false){
			$_SESSION['isRegistFlag'] = true;

		} else {
			$_SESSION['registResult'] = true;

		}
		
		return $result_add;
		
		mysqli_close($link);
	}
}
