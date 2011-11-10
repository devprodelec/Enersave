<div class="half">  
  <div class="header">
	<h3><?php echo __("Editar Equipo") ?></h3>
	<?php
	  $options = array('class' => 'icon list');
	  echo $this->Html->link('Detalles', '/equipements/'.$equipement_id, $options);
	?>
  </div>
  <?php
	$inputDefaults = array('label'=>false, 'error'=>array('wrap'=>'span', 'class'=>'error')); 
	echo $this->Form->create('Equipement', array('action' => 'edit', 'inputDefaults' => $inputDefaults));
	echo $this->Form->hidden('id');
  ?>
  <table>
	<tr class="even">
		<th><?php echo __("Campo") ?></th>
		<th><?php echo __("Valor") ?></th>
	</tr>
	<tr class="odd">
	  <td><?php echo $this->Form->label('name', 'Nombre') ?></td>
	  <td><?php echo $this->Form->input('name') ?></td>
	</tr>
	<tr class="even">
	  <td><?php echo $this->Form->label('location_id', 'Ubicaci&oacute;n') ?></td>
	  <td><?php echo $this->Form->input('location_id') ?></td>
	</tr>
	<tr class="footer">
	  <td></td>
	  <td class="alignright">
		<?php
		  $options = array('type'=>'button', 'onclick'=>"history.go(-1);return false;"); 
		  echo $this->Form->button('Cancelar', $options);
		?>
		<?php echo $this->Form->submit('Guardar', array('div'=>false)); ?>
	  </td>
	</tr>
  </table>
  <?php echo $this->Form->end(); ?>
</div>

<div class="main">
  <div class="header">
	<h3><?php echo __("Porcentajes por Proceso") ?></h3>
	<?php
	  $options = array('class' => 'icon add');
	  echo $this->Html->link("Agregar", '/process_rates/add/'.$equipement_id, $options);
	?>
  </div>
  <table>
	<tr>
		<th><?php echo __("Proceso") ?></th>
		<th><?php echo __("Porcentaje") ?></th>
		<th class="aligncenter"><?php echo __("Acciones") ?></th>
	</tr>
	<?php
	foreach($this->data['ProcessRate'] as $rate) {
		$actions = $this->Html->link(
			$this->Html->image("icons/fugue/card-pencil.png", array("alt" => "Edit")),
			"/process_rates/edit/".$equipement_id."/".$rate['id'],
			array('escape' => false)
		).' '.
		$this->Html->link(
			$this->Html->image("icons/fugue/minus-button.png", array("alt" => "Delete")),
			"/process_rates/delete/".$equipement_id."/".$rate['id'],
			array('escape' => false),
			"Se va a eliminar este porcentaje. &iquest;Est&aacute; seguro?"
		);
		$tr = array (
			$rate['Process']['name'],
			$rate['rate'],
			array($actions, array('class' => 'alignright')),
		);
		$oddTrOptions = array('class' => 'odd');
		$evenTrOptions = array('class' => 'even');
		echo $html->tableCells($tr, $oddTrOptions, $evenTrOptions);
	}
	?>
  </table>
</div>