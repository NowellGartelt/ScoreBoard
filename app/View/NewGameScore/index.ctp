<!-- app/View/Newgame/index.ctp -->
<p class="padding11"></p>
<?php if($_SESSION['errorFlag_NewScore'] == true){ ?>
	<font size="4" color="#ff0000">メンバーが1人も選択されていません。</font>
<?php } elseif($_SESSION['isRegistFlag_NewScore'] == true){ ?>
	<font size="4" color="#ff0000">入力されたスコアは登録済みです。</font>
<?php } elseif($_SESSION['registResult_NewScore'] == true){ ?>
	<font size="4" color="#ff0000">登録しました。</font>
<?php } else {?>
	<p class="padding11"></p>
<?php } ?>
<form method="post" action="/ScoreBoard/Newgamescore/MemberScoreRegist/">
	<p class="mb2">
		<h3>日付</h3>
		<select name="year" size="1">
			<?php for($countYear = 0; $countYear <=9; $countYear++){ ?>
			<option value=
			<?php echo $displayYear[$countYear]; ?>
			>
			<?php echo $displayYear[$countYear];?>
			</option>
			<?php } ?>
		</select>
		<select name="month" size="1">
			<?php 
			for($countMonth = 1; $countMonth <= 12; $countMonth++){ 
				$displayMonth = sprintf('%02d', $countMonth);
			?>
			<option value=
			<?php echo $displayMonth; ?>
			<?php if($todayMonth == $displayMonth) { echo 'selected'; }?>
			>
			<?php echo $displayMonth; ?>
			</option>
			<?php } ?>
		</select>
		<select name="day" size="1">
			<?php 
			for($countDay = 1; $countDay <= 31; $countDay++){ 
				$displayDay = sprintf('%02d', $countDay);
			?>
			<option value=
			<?php echo $displayDay; ?>
			<?php if($todayDay == $displayDay) { echo 'selected'; }?>
			>
			<?php echo $displayDay; ?>
			</option>
			<?php } ?>
		</select>
	</p>
	<p class="mb2">
		<h3>回戦</h3>
		<select name="gameno" size="1">
			<?php 
			for($countGame = 1; $countGame <= 20; $countGame++){ 
				$displayGame = sprintf('%02d', $countGame);
			?>
			<option value=
			<?php echo $displayGame; ?>
			>
			<?php echo $displayGame; ?>
			</option>
			<?php } ?>
		</select>
	</p>
	<p class="mb2">
		<h3>ゲームタイトル</h3>
		<select name="gametitle" size="1">
			<option value="ラブライブ！ボードゲーム ファン獲得スクールアイドル大作戦！">ラブライブ！ボードゲーム ファン獲得スクールアイドル大作戦！</option>
			<option value="ラブライブ！スクールアイドルコレクション">ラブライブ！スクールアイドルコレクション</option>
		</select>
	</p>
	<p class="padding11"></p>
				<input type ="checkbox" name="member01" value="" />
				<h3>Member01</h3>
				<input type ="checkbox" name="member02" value="" />
				<h3>Member02</h3>
				<input type ="checkbox" name="member03" value="" />
				<h3>Member03</h3>
				<input type ="checkbox" name="member04" value="" />
				<h3>Member04</h3>
				<input type ="checkbox" name="member05" value="" />
				<h3>Member05</h3>
		</table>
	<p class="padding11"></p>
	<p class="mb2">
		<input type="submit" value="次へ" />
	</p>
</form>
<form method="post" action="/ScoreBoard/TopPage/">
	<input type="submit" value="戻る" />
</form>
