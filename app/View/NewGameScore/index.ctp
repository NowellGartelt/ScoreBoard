<!-- app/View/Newgame/index.ctp -->
<p class="padding11"></p>
<?php if($_SESSION['errorFlag'] == true){ ?>
	<font size="4" color="#ff0000">メンバーが1人も選択されていません。</font>
<?php } elseif($_SESSION['isRegistFlag'] == true){ ?>
	<font size="4" color="#ff0000">入力されたスコアは登録済みです。</font>
<?php } elseif($_SESSION['registResult'] == true){ ?>
	<font size="4" color="#ff0000">登録しました。</font>
<?php } else {?>
	<p class="padding11"></p>
<?php } ?>
<form method="post" action="/ScoreBoard/NewGameScore/MemberScoreRegist/">
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
		<?php foreach($gameTitle as $name){ ?>
			<option value="<?php echo $name; ?>"><?php echo $name; ?></option>
		<?php } ?>
		</select>
	</p>
	<p class="padding11"></p>
		<?php $countMember = 1; ?>
		<?php foreach($member as $name){
				// $memberNo = sprintf('%02d', $countMember); ?>
				<input type="checkbox" id="member<?php echo $countMember; ?>" name="member[]" value="<?php echo $countMember; ?>" />
				<h3><?php echo $name; ?></h3>
		<?php 	$countMember++ ?>
		<?php } ?>
	<p class="padding11"></p>
	<p class="mb2">
		<input type="submit" value="次へ" />
	</p>
</form>
<form method="post" action="/ScoreBoard/TopPage/">
	<input type="submit" value="戻る" />
</form>
