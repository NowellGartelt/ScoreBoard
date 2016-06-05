<!-- /app/Model/GameAdd.php-->
<?php
class GameAdd{
	public function	GameAdd($gamename, $gamememo){
		$this->gamename = $gamename;
		$this->gamememo = $gamememo;
		
		$link = mysqli_connect('localhost','root','axcel696','ScoreBoard');
		mysqli_set_charset($link, 'utf8');
		
		$query_getId = "select MAX(gametitleid) from gametitletable";
		$result_getId = mysqli_query($link, $query_getId);
		$row = mysqli_fetch_array($result_getId);
		$getId = $row[0];
		$gametitleId = $getId + 1;

		$addDate = date("YmdHis");
		
		$query_add = "insert into gametitletable (gametitleid, gamename, gamememo, adddate, updatedate) 
						values (
							'$gametitleId',
							'$gamename',
							'$gamememo',
							'$addDate',
							null
						)";

		$result_add = mysqli_query($link, $query_add);
		
		if($result_add == false){
			$_SESSION['isRegistFlag_NewGame'] = true;
		} else {
			$_SESSION['registResult_NewGame'] = true;
		}
		
		return $result_add;
		
		mysqli_close($link);
	}
}