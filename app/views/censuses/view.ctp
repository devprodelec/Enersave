<div class="main">
  <h2><?php echo __("Por Ubicacion") ?></h2>
  <div class="header">
	<h3><?php echo __("Detalles del Censo") ?></h3>
	<?php
	  $options = array('class' => 'icon add');
	  echo $this->Html->link("Agregar", '/census_details/add/'.$census_id, $options);
	?>
  </div>
  <table>
	<tr>
		<th><?php echo __("Equipo") ?></th>
		<th><?php echo __("Cantidad") ?></th>
		<th><?php echo __("Potencia") ?></th>
		<th><?php echo __("Horas/Dia") ?></th>
		<th><?php echo __("Dias/Mes") ?></th>
		<th class="aligncenter"><?php echo __("Acciones") ?></th>
	</tr>
	<?php
	foreach($this->data['CensusDetail'] as $census_detail) {
		$actions = $this->Html->link(
			$this->Html->image("icons/fugue/card-pencil.png", array("alt" => "Edit")),
			"/census_details/edit/".$census_detail['id'],
			array('escape' => false)
		).' '.
		$this->Html->link(
			$this->Html->image("icons/fugue/minus-button.png", array("alt" => "Delete")),
			"/census_details/delete/".$census_detail['id'],
			array('escape' => false),
			"Se va a eliminar este registro del Censo. &iquest;Est&aacute; seguro?"
		);
		$tr = array (
			$html->link(
				$census_detail['Equipement']['name'],
				'/census_details/'.$census_detail['id']
			),
			$census_detail['quantity'],
			$census_detail['power'],
			$census_detail['hours_per_day'],
			$census_detail['days_per_month'],
			array($actions, array('class' => 'alignright')),
		);
		$oddTrOptions = array('class' => 'odd');
		$evenTrOptions = array('class' => 'even');
		echo $html->tableCells($tr, $oddTrOptions, $evenTrOptions);
	}
	?>
  </table>
</div>

<div class="main">
	<h2><?php echo __("Por Proceso") ?></h2>
</div>