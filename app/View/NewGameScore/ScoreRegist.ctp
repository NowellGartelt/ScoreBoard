<!-- app/View/Newgame/index.ctp -->
<p class="padding15"></p>
<form method="post" action="/ScoreBoard/Newgamescore/ScoreRegist/">
<table>
	<tr>
		<th>メンバー名</th>
		<th>スコア</th>
	</tr>
	<tr>
		<td><h3>Y.Nakamura</h3></td>
		<td><input type ="text" name="score01" value="" size="3" /></td>
	</tr>	
	<tr>
		<td><h3>塚本　憲明</h3></td>
		<td><input type ="text" name="score02" value="" size="3" /></td>
	</tr>	
	<tr>
		<td><h3>八屋　亮二</h3></td>
		<td><input type ="text" name="score03" value="" size="3" /></td>
	</tr>	
	<tr>
		<td><h3>谷　大介</h3></td>
		<td><input type ="text" name="score04" value="" size="3" /></td>
	</tr>	
	<tr>
		<td><h3>小塙　大征</h3></td>
		<td><input type ="text" name="score05" value="" size="3" /></td>
	</tr>	
</table>
	<p class="padding15"></p>
	<p class="mb2">
		<input type="submit" value="登録" />
	</p>
</form>
<form method="post" action="/ScoreBoard/TopPage">
	<input type="submit" value="戻る" />
</form>
