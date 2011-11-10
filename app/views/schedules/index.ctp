<h2><?php echo __("Cronograma") ?></h2>
<div class="wide">
	<?php
	//debug($weekdays);
	foreach($weekdays as $weekday) {
	?>
		<div class="header">
		<h3><?php echo $weekday['weekday']['EntryWeekday']['name']; ?></h3>
		</div>
		<table>
		<tr>
			<th width="230"><?php echo __("Proceso"); ?></th>
			<th><?php echo __("Comentario"); ?></th>
			<?php
				for($i = 0; $i < 24; $i++) {
					?><th width="10" style="padding:8px 4px;"><?php echo $i; ?></th><?php 
				} 
			?>
		</tr>
		<?php
		foreach($weekday['schedules'] as $schedule) {
			$tr = array (
				$schedule['Process']['name'],
				$schedule['Process']['comment'],
			);
			for($i = 0; $i < 24; $i++) {
				$day = $schedule['ColorMarks'][$i];
				$tr[] = empty($day) ? "" : array($day, array("class"=>"mark bg-".$day));
			} 
			$oddTrOptions = array('class' => 'odd');
			$evenTrOptions = array('class' => 'even');
			echo $html->tableCells($tr, $oddTrOptions, $evenTrOptions);
		}
		?>
		</table>
	<?php
	  }
	?>
</div>