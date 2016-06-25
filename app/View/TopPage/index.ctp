<!-- app/View/Scoreboards/index.ctp -->
<p class="padding11"></p>
<div style="display:inline-flex">
	<form method="post" action="/ScoreBoard/NewGame">
		<p class="mb2">
			<input type="submit" value="ゲームを登録する" />
		</p>
	</form>
<!--
	<form method="post" action="/GameReference">
		<p class="mb2">
			<input type="submit" value="ゲームを見る" />
		</p>
	</form>
-->
	<form method="post" action="/ScoreBoard/NewGameScore">
		<p class="mb2">
			<input type="submit" value="スコアを登録する" />
		</p>
	</form>
<!--
	<form method="post" action="/GameScoreReference">
		<p class="mb2">
			<input type="submit" value="スコアを見る" />
		</p>
	</form>
-->
	<form method="post" action="/ScoreBoard/NewMember">
		<p class="mb2">
			<input type="submit" value="メンバーを追加する" />
		</p>
	</form>
<!--
	<form method="post" action="/MemberReference">
		<p class="mb2">
			<input type="submit" value="メンバーを見る" />
		</p>
	</form>
-->
	<form method="post" action="/ScoreBoard/Logout">
		<p class="mb2">
			<input type="submit" value="ログアウト" />
		</p>
	</form>
</div>
<p class="padding11"></p>
<h3>日時：<?php echo $recentlyGameDate; ?></h3>
<p class="padding11"></p>
<p class="padding11"></p>
<p class="padding11"></p>
<table>
	<tr>
		<th>回</th>
		<th>ゲーム名</th>
<?php for($i = 0; $i < $_SESSION['entry']; $i++){ ?>
		<th><?php echo $_SESSION['entryMember'][$i]; ?></th>
<?php }?>
	</tr>
<?php for($i = 1; $i <= $_SESSION['gameCount']; $i++){ ?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php 
			echo $_SESSION['gameTitle'][$i];
		?></td> 
<?php 	for($j = 1; $j <= $_SESSION['entry']; $j++){
			if(!$_SESSION['recentlyScore'][$i][$j]){ ?>
		<td><?php  echo "-"; ?></td>
<?php		} else { ?>
		<td><?php  echo $_SESSION['recentlyScore'][$i][$j]; ?></td>
<?php		}
 	  	} ?>
	</tr>
<?php } ?>
</table>
