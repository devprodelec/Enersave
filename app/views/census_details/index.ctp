<div class="main">
  <div class="header">
	<h3><?php echo __("Detalles del Censo") ?></h3>
	<?php
	  $options = array('class' => 'icon add');
	  echo $this->Html->link("Agregar", '/census_details/add/', $options);
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
	foreach($census_details as $census_detail) {
		$actions = $this->Html->link(
			$this->Html->image("icons/fugue/card-pencil.png", array("alt" => "Edit")),
			"/census_details/edit/".$census_detail['CensusDetail']['id'],
			array('escape' => false)
		).' '.
		$this->Html->link(
			$this->Html->image("icons/fugue/minus-button.png", array("alt" => "Delete")),
			"/census_details/delete/".$census_detail['CensusDetail']['id'],
			array('escape' => false),
			"Se va a eliminar este registro del Censo. &iquest;Est&aacute; seguro?"
		);
		$tr = array (
			$html->link(
				$census_detail['Equipement']['name'],
				'/census_details/'.$census_detail['CensusDetail']['id']
			),
			$census_detail['CensusDetail']['quantity'],
			$census_detail['CensusDetail']['power'],
			$census_detail['CensusDetail']['hours_per_day'],
			$census_detail['CensusDetail']['days_per_month'],
			array($actions, array('class' => 'alignright')),
		);
		$oddTrOptions = array('class' => 'odd');
		$evenTrOptions = array('class' => 'even');
		echo $html->tableCells($tr, $oddTrOptions, $evenTrOptions);
	}
	?>
  </table>
</div>