<?php 
// app/Controller/MembereditController.php
class MembereditController extends AppController {
	
	public function index(){
		// メンバー編集ページ
		// メンバー一覧を表示
		// 対象のメンバーを選択
		$this -> render('index');
	}
}
?>