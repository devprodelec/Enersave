<div class="main">
  <div class="header">
	<h3><?php echo __("Procesos") ?></h3>
	<?php
	  $options = array('class' => 'icon add');
	  echo $this->Html->link("Agregar", '/processes/add/', $options);
	?>
  </div>
  <table>
	<tr>
		<th><?php echo __("Nombre") ?></th>
		<th><?php echo __("Comentario") ?></th>
		<th class="aligncenter"><?php echo __("Acciones") ?></th>
	</tr>
	<?php
	foreach($processes as $process) {
		$actions = $this->Html->link(
			$this->Html->image("icons/fugue/calendar-month.png", array("alt" => "Cronograma")),
			"/schedules/process/".$process['Process']['id'],
			array('escape' => false)
		).' '.
		$this->Html->link(
			$this->Html->image("icons/fugue/card-pencil.png", array("alt" => "Edit")),
			"/processes/edit/".$process['Process']['id'],
			array('escape' => false)
		).' '.
		$this->Html->link(
			$this->Html->image("icons/fugue/minus-button.png", array("alt" => "Delete")),
			"/processes/delete/".$process['Process']['id'],
			array('escape' => false),
			"Se va a eliminar este Proceso. &iquest;Est&aacute; seguro?"
		);
		$tr = array (
			$html->link(
				$process['Process']['name'],
				'/processes/'.$process['Process']['id']
			),
			$process['Process']['comment'],
			array($actions, array('class' => 'alignright')),
		);
		$oddTrOptions = array('class' => 'odd');
		$evenTrOptions = array('class' => 'even');
		echo $html->tableCells($tr, $oddTrOptions, $evenTrOptions);
	}
	?>
  </table>
</div>