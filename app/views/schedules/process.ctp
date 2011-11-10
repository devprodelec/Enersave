<div class="main">
  <div class="header">
	<h3><?php echo $process['Process']['name'] ?></h3>
	<?php
	  $options = array('class' => 'icon add');
	  echo $this->Html->link('Agregar horario', '/schedules/add/'.$process_id, $options);
	?>
  </div>
  <table>
	<tr>
		<th><?php echo __("Dia de Entrada") ?></th>
		<th><?php echo __("Dia de Proceso") ?></th>
		<th><?php echo __("Hora de Inicio") ?></th>
		<th><?php echo __("Hora de Fin") ?></th>
		<th class="aligncenter"><?php echo __("Acciones") ?></th>
	</tr>
	<?php
	foreach($schedules as $schedule) {
		$actions = $this->Html->link(
			$this->Html->image("icons/fugue/card-pencil.png", array("alt" => "Edit")),
			"/schedules/edit/".$schedule['Schedule']['id'],
			array('escape' => false)
		).' '.
		$this->Html->link(
			$this->Html->image("icons/fugue/minus-button.png", array("alt" => "Delete")),
			"/schedules/delete/".$schedule['Schedule']['id']."/".$process_id,
			array('escape' => false),
			"Se va a eliminar este Horario. &iquest;Est&aacute; seguro?"
		);
		$tr = array (
			$schedule['EntryWeekday']['name'],
			$schedule['ProcWeekday']['name'],
			$schedule['Schedule']['proc_hour_start'],
			$schedule['Schedule']['proc_hour_end'],
			array($actions, array('class' => 'alignright')),
		);
		$oddTrOptions = array('class' => 'odd');
		$evenTrOptions = array('class' => 'even');
		echo $html->tableCells($tr, $oddTrOptions, $evenTrOptions);
	}
	?>
  </table>
</div>