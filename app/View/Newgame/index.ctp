<!-- app/View/Newgame/index.ctp -->
<p class="padding11"></p>
<?php if($_SESSION['errorFlag_NewGame'] == true){ ?>
	<font size="4" color="#ff0000">名前が未入力です。</font>
<?php } elseif($_SESSION['isRegistFlag_NewGame'] == true && $_SESSION['registResult_NewGame'] == false){ ?>
	<font size="4" color="#ff0000">その名前はすでに登録されています。</font>
<?php } elseif($_SESSION['isRegistFlag_NewGame'] == false && $_SESSION['registResult_NewGame'] == true){ ?>
	<font size="4" color="#ff0000">登録しました。</font>
<?php } else {?>
	<p class="padding5"></p>
<?php } ?>
<form method="post" action="/ScoreBoard/NewGame/NewGameRegist/">
	<p class="mb2">
		<h3>ゲームタイトル</h3>
		<input type ="text" name="gameName" value="" size="10" />
	</p>
	<p class="mb2">
		<h3>メモ</h3>
		<input type ="textarea" name="gameMemo" value="" size="140" />
	</p>
	<p class="padding11"></p>
	<p class="mb2">
		<input type="submit" value="登録" />
	</p>
</form>
<form method="post" action="/ScoreBoard/TopPage">
	<input type="submit" value="戻る" />
</form>
