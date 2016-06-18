<!-- app/View/Newgame/index.ctp -->
<p class="padding15"></p>
<form method="post" action="/ScoreBoard/NewGameScore/ScoreRegist/">
<table>
	<tr>
		<th>メンバー名</th>
		<th>スコア</th>
	</tr>
<?php $countMember = 0; ?>
<?php foreach ($entryMemberName as $memberName) { ?>
<?php 	$id = sprintf('%02d', $entryMember[$countMember]); ?>
	<tr>
		<td><h3><?php echo $entryMemberName[$countMember]; ?></h3></td>
		<td><input type ="text" name="score<?php echo $id; ?>" value="" size="3" /></td>
	</tr>
<?php 	$countMember++; ?>
<?php } ?>

<!--
	<tr>
		<td><h3>Member01</h3></td>
		<td><input type ="text" name="score01" value="" size="3" /></td>
	</tr>	
	<tr>
		<td><h3>Member02</h3></td>
		<td><input type ="text" name="score02" value="" size="3" /></td>
	</tr>	
	<tr>
		<td><h3>Member03</h3></td>
		<td><input type ="text" name="score03" value="" size="3" /></td>
	</tr>	
	<tr>
		<td><h3>Member04</h3></td>
		<td><input type ="text" name="score04" value="" size="3" /></td>
	</tr>	
	<tr>
		<td><h3>Member05</h3></td>
		<td><input type ="text" name="score05" value="" size="3" /></td>
	</tr>
-->
</table>
	<p class="padding15"></p>
	<p class="mb2">
		<input type="submit" value="登録" />
	</p>
</form>
<form method="post" action="/ScoreBoard/TopPage">
	<input type="submit" value="戻る" />
</form>
