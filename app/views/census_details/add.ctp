<div class="main">  
  <div class="header">
	<h3><?php echo __("Agregar Detalles del Censo") ?></h3>
  </div>
  <?php
	$inputDefaults = array('label'=>false, 'error'=>array('wrap'=>'span', 'class'=>'error'));
	$url = array('action'=>'add', $census_id);
	echo $this->Form->create('CensusDetail', array('url' => $url, 'inputDefaults' => $inputDefaults));
	echo $this->Form->hidden('census_id', array('value'=>$census_id));
  ?>
  <table>
	<tr class="even">
	  <th width="100"><?php echo __("Campo") ?></th>
	  <th><?php echo __("Valor") ?></th>
	</tr>
	<tr class="odd">
	  <td><?php echo $this->Form->label('location_id', 'Ubicacion') ?></td>
	  <td><?php echo $this->Form->input('location_id', array('id' =>'LocationId', 'empty' => 'Seleccione...')) ?></td>
	</tr>
	<tr class="even">
	  <td><?php echo $this->Form->label('equipement_id', 'Equipo') ?></td>
	  <td><?php echo $this->Form->input('equipement_id', array('id' =>'EquipementId')) ?></td>
	</tr>
	<tr class="odd">
	  <td><?php echo $this->Form->label('quantity', 'Cantidad') ?></td>
	  <td><?php echo $this->Form->input('quantity') ?></td>
	</tr>
	<tr class="even">
	  <td><?php echo $this->Form->label('power', 'Potencia (Kw)') ?></td>
	  <td><?php echo $this->Form->input('power') ?></td>
	</tr>
	<tr class="odd">
	  <td><?php echo $this->Form->label('hours_per_day', 'Horas/Dia') ?></td>
	  <td><?php echo $this->Form->input('hours_per_day') ?></td>
	</tr>
	<tr class="even">
	  <td><?php echo $this->Form->label('days_per_month', 'Dias/Mes') ?></td>
	  <td><?php echo $this->Form->input('days_per_month') ?></td>
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
  <?php
  	$this->Js->get('#LocationId')->event('change',
		$this->Js->request( 
			array('controller' => 'census_details', 'action' => 'ajax_equipements'), 
			array( 
				'update' => '#EquipementId', 
				'async' => true, 
				'dataExpression' => true, 
				'method' => 'post', 
				'data' => $js->serializeForm(array('isForm' => false, 'inline' => true))
			) 
		)
	); 
  ?>
  <?php echo $this->Form->end(); ?>
</div>