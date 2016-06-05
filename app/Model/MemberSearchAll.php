<!-- /app/Model/MemberSearshByName.php-->
<?php
class MemberSearchAll{
	
	public function MemberSearchAll(){
		$link = mysqli_connect('localhost','root','axcel696','ScoreBoard');
		mysqli_set_charset($link, 'utf8');
		
		$query = "select name from usertable";
		$result = mysqli_query($link, $query);
		$i = 1;
		while($row = mysqli_fetch_array($result)){
			$getName[$i] = $row;
			$i++;
		}
		
		var_dump($getName);
		
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