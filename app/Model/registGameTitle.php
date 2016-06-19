<!-- /app/Model/registGameTitle.php-->
<?php
class registGameTitle{
	public function	registGameTitle($gameName, $gameMemo){
		$this->gameName = $gameName;
		$this->gameMemo = $gameMemo;
		
		$link = mysqli_connect('localhost','iinchou','meganekko','ScoreBoard');
		mysqli_set_charset($link, 'utf8');
		
		$queryGetId = "select MAX(gametitleid) from gametitletable";
		$resultGetId = mysqli_query($link, $queryGetId);
		$row = mysqli_fetch_array($resultGetId);
		$getId = $row[0];
		$gameTitleId = $getId + 1;

		$addDate = date("YmdHis");
		
		$queryRegist = "insert into gametitletable (gametitleid, gamename, gamememo, adddate, updatedate) 
						values (
							'$gameTitleId',
							'$gameName',
							'$gameMemo',
							'$addDate',
							null
						)";

		$resultRegist = mysqli_query($link, $queryRegist);
		
		if($resultRegist == false){
			$_SESSION['isRegistFlag_NewGame'] = true;
		} else {
			$_SESSION['registResult_NewGame'] = true;
		}
		
		return $resultRegist;
		
		mysqli_close($link);
	}
}