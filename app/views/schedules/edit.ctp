<div class="half">  
  <div class="header">
	<h3><?php echo __("Editar Horario") ?></h3>
  </div>
  <?php
	$inputDefaults = array('label'=>false, 'error'=>array('wrap'=>'span', 'class'=>'error')); 
	echo $this->Form->create('Schedule', array('action' => 'edit/'.$schedule_id, 'inputDefaults' => $inputDefaults));
	echo $this->Form->hidden('id');
	echo $this->Form->hidden('process_id');
  ?>
  <table>
	<tr class="even">
		<th><?php echo __("Campo") ?></th>
		<th><?php echo __("Valor") ?></th>
	</tr>
	<tr class="odd">
	  <td><?php echo $this->Form->label('entry_weekday', 'Dia de Entrada') ?></td>
	  <td><?php echo $this->Form->input('entry_weekday') ?></td>
	</tr>
	<tr class="even">
	  <td><?php echo $this->Form->label('proc_weekday', 'Dia de Proceso') ?></td>
	  <td><?php echo $this->Form->input('proc_weekday') ?></td>
	</tr>
	<tr class="odd">
	  <td><?php echo $this->Form->label('proc_hour_start', 'Hora de Inicio') ?></td>
	  <td><?php echo $this->Form->input('proc_hour_start') ?></td>
	</tr>
	<tr class="even">
	  <td><?php echo $this->Form->label('proc_hour_end', 'Hora de Din') ?></td>
	  <td><?php echo $this->Form->input('proc_hour_end') ?></td>
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
