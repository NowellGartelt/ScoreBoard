<!-- /app/Model/searchMemberCountAll.php-->
<?php
class searchMemberCountAll{
	public function searchMemberCountAll(){
		$getName = array();

		$link = mysqli_connect('localhost','iinchou','meganekko','ScoreBoard');
		mysqli_set_charset($link, 'utf8');

		$query = "select count(*) from usertable";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		
		$_SESSION['getAllMemberCount'] = $row[0];

		mysqli_close($link);
	}
}