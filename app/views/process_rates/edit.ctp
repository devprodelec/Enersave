<div class="half">  
  <div class="header">
	<h3><?php echo __("Editar Procentaje") ?></h3>
  </div>
  <?php
	$inputDefaults = array('label'=>false, 'error'=>array('wrap'=>'span', 'class'=>'error')); 
	echo $this->Form->create('ProcessRate', array('action' => 'add/'.$equipement_id, 'inputDefaults' => $inputDefaults));
	echo $this->Form->hidden('id');
	echo $this->Form->hidden('equipement_id', array('value'=>$equipement_id));
  ?>
  <table>
	<tr class="even">
		<th><?php echo __("Campo") ?></th>
		<th><?php echo __("Valor") ?></th>
	</tr>
	<tr class="odd">
	  <td><?php echo $this->Form->label('process_id', 'Proceso') ?></td>
	  <td><?php echo $this->Form->input('process_id') ?></td>
	</tr>
	<tr class="even">
	  <td><?php echo $this->Form->label('rate', 'Porcentaje') ?></td>
	  <td><?php echo $this->Form->input('rate') ?></td>
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