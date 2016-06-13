<!-- /app/Model/searchGameAll.php-->
<?php
class searchGameAll{
	public function searchGameAll(){
		$getName = array();

		$link = mysqli_connect('localhost','root','axcel696','ScoreBoard');
		mysqli_set_charset($link, 'utf8');
		
		$query = "select gamename from gametitletable";
		$result = mysqli_query($link, $query);
		$i = 1;
		while($row = mysqli_fetch_array($result)){
			$getGameTitle[$i] = $row;
			$_SESSION['getAllGameTitle'][$i] = $getGameTitle[$i]['gamename'];
			$i++;
		}
		
		if($getGameTitle == null){
			return true;
		} else {
			return false;
		}
		mysqli_close($link);
	}
}