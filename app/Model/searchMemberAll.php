<!-- /app/Model/searchMemberAll.php-->
<?php
class searchMemberAll{
	public function searchMemberAll(){
		$getName = array();

		$link = mysqli_connect('localhost','iinchou','meganekko','ScoreBoard');
		mysqli_set_charset($link, 'utf8');
		
		$query = "select name from usertable order by userid";
		$result = mysqli_query($link, $query);
		$i = 1;
		while($row = mysqli_fetch_array($result)){
			$getName[$i] = $row;
			$_SESSION['getAllMember'][$i] = $getName[$i]['name'];
			$i++;
		}

		if($getName == null){
			return true;
		} else {
			return false;
		}
		mysqli_close($link);
	}
}