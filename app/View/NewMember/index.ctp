<!-- app/View/NewMemner/index.ctp -->
<p class="padding11"></p>
<?php if($_SESSION['errorFlag'] == true){ ?>
	<font size="4" color="#ff0000">名前もしくはパスワードが未入力です。</font>
<?php } elseif($_SESSION['isRegistFlag'] == true){ ?>
	<font size="4" color="#ff0000">入力された名前は登録済みです。</font>
<?php } elseif($_SESSION['registResult'] == true){ ?>
	<font size="4" color="#ff0000">登録しました。</font>
<?php } else {?>
	<p class="padding5"></p>
<?php } ?>
<form method="post" action="/ScoreBoard/NewMember/MemberRegist/">
	<p class="mb2">
		<h3>名前</h3>
		<input type ="text" name="name" value="" size="10" />
	</p>
	<p class="mb2">
		<h3>ID</h3>
		<input type ="text" name="userID" value="" size="10" />
	</p>
	<p class="mb2">
		<h3>パスワード</h3>
		<input type ="password" name="password" value="" size="10" />
	</p>
	<p class="mb2">
		<h3>管理者フラグ</h3>
		<input type ="checkbox" name="isAdmin" value="" />
	</p>
	<p class="padding11"></p>
	<p class="mb2">
		<input type="submit" value="登録" />
	</p>
</form>
<form method="post" action="/ScoreBoard/TopPage/">
	<input type="submit" value="戻る" />
</form>
