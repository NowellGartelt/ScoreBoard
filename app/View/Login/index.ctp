<!-- app/View/Newgame/index.ctp -->
<p class="padding11"></p>
<?php if($_SESSION['errorFlag'] == true){ ?>
	<font size="4" color="#ff0000">ログインIDもしくはパスワードが未入力です。</font>
<?php } elseif($_SESSION['loginError'] == true){ ?>
	<font size="4" color="#ff0000">ログインIDもしくはパスワードが一致しません。</font>
<?php } else {?>
	<p class="padding5"></p>
<?php } ?>
<form method="post" action="/ScoreBoard/Login/authLogin/">
	<p class="mb2">
		<h3>ログインID</h3>
		<input type ="text" name="loginId" value="" size="10" />
	</p>
	<p class="mb2">
		<h3>パスワード</h3>
		<input type ="password" name="loginPassword" value="" size="10" />
	</p>
	<p class="padding11"></p>
	<p class="mb2">
		<input type="submit" value="ログイン" />
	</p>
</form>
