<div class="main">
  <div class="header">
	<h3><?php echo __("Ubicaciones") ?></h3>
	<?php
	  $options = array('class' => 'icon add');
	  echo $this->Html->link("Agregar", '/locations/add/', $options);
	?>
  </div>
  <table>
	<tr>
		<th><?php echo __("Nombre") ?></th>
		<th class="aligncenter"><?php echo __("Acciones") ?></th>
	</tr>
	<?php
	foreach($locations as $location) {
		$actions = $this->Html->link(
			$this->Html->image("icons/fugue/card-pencil.png", array("alt" => "Edit")),
			"/locations/edit/".$location['Location']['id'],
			array('escape' => false)
		).' '.
		$this->Html->link(
			$this->Html->image("icons/fugue/minus-button.png", array("alt" => "Delete")),
			"/locations/delete/".$location['Location']['id'],
			array('escape' => false),
			"Se va a eliminar este Ubicaci&oacute;n. &iquest;Est&aacute; seguro?"
		);
		$tr = array (
			$html->link(
				$location['Location']['name'],
				'/locations/'.$location['Location']['id']
			),
			array($actions, array('class' => 'alignright')),
		);
		$oddTrOptions = array('class' => 'odd');
		$evenTrOptions = array('class' => 'even');
		echo $html->tableCells($tr, $oddTrOptions, $evenTrOptions);
	}
	?>
  </table>
</div>