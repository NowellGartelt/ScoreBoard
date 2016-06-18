<!-- app/View/Scoreboards/index.ctp -->
<p class="padding11"></p>
<?php echo $this->Html->link('ゲームを登録する','/NewGame'); ?>
<?php echo " "; ?>
<!--
<?php echo $this->Html->link('ゲームを見る','/GameReference'); ?>
<?php echo " "; ?>
-->
<?php echo $this->Html->link('スコアを登録する','/NewGameScore'); ?>
<?php echo " "; ?>
<!--
<?php echo $this->Html->link('スコアを見る','/GameScoreReference'); ?>
<?php echo " "; ?>
-->
<?php echo $this->Html->link('メンバーを追加する','/NewMember'); ?>
<?php echo " "; ?>
<!--
<?php echo $this->Html->link('メンバーを見る','/MemberReference'); ?>
<?php echo " "; ?>
-->
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
		<td><?php  echo "0"; ?></td>
<?php		} else { ?>
		<td><?php  echo $_SESSION['recentlyScore'][$i][$j]; ?></td>
<?php		}
 	  	} ?>
	</tr>
<?php } ?>
</table>
