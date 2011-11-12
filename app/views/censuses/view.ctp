<div class="wide">
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
		<th><?php echo __("Consumo (Kwh)") ?></th>
		<th><?php echo __("% De Consumo en el Area") ?></th>
		<th><?php echo __("% De Consumo Total") ?></th>
		<th class="aligncenter"><?php echo __("Acciones") ?></th>
	</tr>
	<?php
	//debug($locations);
	$num_format = array('places' => 2, 'before' => '', 'escape' => false, 'decimals' => ',', 'thousands' => '.');
	$per_format = array('places' => 2, 'before' => '', 'after' => '%', 'escape' => false, 'decimals' => ',', 'thousands' => '.');
	foreach($locations as $location) {
		foreach($location['details'] as $census_detail) {
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
				array($census_detail['quantity'], array('class' => 'alignright')),
				array($census_detail['power'], array('class' => 'alignright')),
				array($census_detail['hours_per_day'], array('class' => 'alignright')),
				array($census_detail['days_per_month'], array('class' => 'alignright')),
				array($this->Number->format($census_detail['consumption'], $num_format), array('class' => 'alignright')),
				array($this->Number->format($census_detail['percent_area'], $per_format), array('class' => 'alignright')),
				array($this->Number->format($census_detail['percent_total'], $per_format), array('class' => 'alignright')),
				array($actions, array('class' => 'alignright')),
			);
			$oddTrOptions = array('class' => 'odd');
			$evenTrOptions = array('class' => 'even');
			echo $html->tableCells($tr, $oddTrOptions, $evenTrOptions);
		}
		$subtotals = $location['totals'];
		$tr = array (
			'Total Area',
			array($subtotals['quantity'], array('class' => 'alignright')),
			'',
			'',
			'',
			array($this->Number->format($subtotals['consumption'], $num_format), array('class' => 'alignright')),
			array($this->Number->format($subtotals['percent_area'], $per_format), array('class' => 'alignright')),
			array($this->Number->format($subtotals['percent_total'], $per_format), array('class' => 'alignright')),
			'',
		);
		$oddTrOptions = array('class' => 'subtotal');
		$evenTrOptions = array('class' => 'subtotal');
		echo $html->tableCells($tr, $oddTrOptions, $evenTrOptions);
	}
	$tr = array (
		'<strong>Total</strong>',
		array($totals['quantity'], array('class' => 'alignright')),
		'',
		'',
		'',
		array($this->Number->format($totals['consumption'], $num_format), array('class' => 'alignright')),
		'',
		'',
		'',
	);
	$oddTrOptions = array('class' => 'footer');
	$evenTrOptions = array('class' => 'footer');
	echo $html->tableCells($tr, $oddTrOptions, $evenTrOptions);
	?>
  </table>
</div>

<div class="main">
	<h2><?php echo __("Por Proceso") ?></h2>
</div>