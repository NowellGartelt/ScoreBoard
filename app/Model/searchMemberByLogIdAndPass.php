<!-- /app/Model/searchMemberByLogIdAndPass.php-->
<?php
class searchMemberByLogIdAndPass{
	private $loginId = '';
	private $loginPassword = '';
	
	public function searchMemberByLogIdAndPass($loginId, $loginPassword){
		$this->loginId = $loginId;
		$this->loginPassword = $loginPassword;

		$link = mysqli_connect('localhost','iinchou','meganekko','ScoreBoard');
		mysqli_set_charset($link, 'utf8');
		
		$query = "select loginPassword from usertable where loginId = '$loginId'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		$getLoginPassword = $row['loginPassword'];

//		var_dump($row);
//		var_dump($getLoginPassword);
//		var_dump($loginPassword);

		if(empty($getLoginPassword)){
			$_SESSION['loginError'] = true;
//			return false;
		} elseif ($getLoginPassword !== $loginPassword) {
			$_SESSION['loginError'] = true;
//			return false;			
		}

		mysqli_close($link);

	}
}