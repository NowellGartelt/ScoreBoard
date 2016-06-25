<?php 
// app/Controller/tools/judgeIsLogined.php
class judgeIsLogined {
	public function judgeIsLogined(){
		if(empty($_SESSION['login'])){
			header( "Location: /ScoreBoard/Login" ) ;

		}
	}
}
?>