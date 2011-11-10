<div class="main">
  <div class="header">
	<h3><?php echo __("Censos de Carga") ?></h3>
	<?php
	  $options = array('class' => 'icon add');
	  echo $this->Html->link("Agregar", '/censuses/add/', $options);
	?>
  </div>
  <table>
	<tr>
		<th><?php echo __("Nombre") ?></th>
		<th class="aligncenter"><?php echo __("Acciones") ?></th>
	</tr>
	<?php
	foreach($censuses as $census) {
		$actions = $this->Html->link(
			$this->Html->image("icons/fugue/card-pencil.png", array("alt" => "Edit")),
			"/censuses/edit/".$census['Census']['id'],
			array('escape' => false)
		).' '.
		$this->Html->link(
			$this->Html->image("icons/fugue/minus-button.png", array("alt" => "Delete")),
			"/censuses/delete/".$census['Census']['id'],
			array('escape' => false),
			"Se va a eliminar este Censo de Carga. &iquest;Est&aacute; seguro?"
		);
		$tr = array (
			$html->link(
				$census['Census']['name'],
				'/censuses/'.$census['Census']['id']
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