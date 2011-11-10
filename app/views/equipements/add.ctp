<div class="half">  
  <div class="header">
	<h3><?php echo __("Agregar Equipo") ?></h3>
  </div>
  <?php
	$inputDefaults = array('label'=>false, 'error'=>array('wrap'=>'span', 'class'=>'error')); 
	echo $this->Form->create('Equipement', array('action' => 'add', 'inputDefaults' => $inputDefaults));
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
		<?php echo $this->Form->submit('Agregar', array('div'=>false)); ?>
	  </td>
	</tr>
  </table>
  <?php echo $this->Form->end(); ?>
</div>
