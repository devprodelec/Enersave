<div class="main">
	<div class="header">
	<h3><?php echo __("Equipos") ?></h3>
	<?php
	  $options = array('class' => 'icon add');
	  echo $this->Html->link("Agregar", '/equipements/add/', $options);
	?>
	</div>
	<table>
		<tr>
			<th><?php echo $this->Paginator->sort('Nombre', 'name'); ?></th>
			<th><?php echo $this->Paginator->sort('Ubicacion', 'Location.name'); ?></th>
			<th class="aligncenter"><?php echo __("Acciones") ?></th>
		</tr>
		<?php
		foreach($equipements as $equipement) {
			$actions = $this->Html->link(
				$this->Html->image("icons/fugue/card-pencil.png", array("alt" => "Edit")),
				"/equipements/edit/".$equipement['Equipement']['id'],
				array('escape' => false)
			).' '.
			$this->Html->link(
				$this->Html->image("icons/fugue/minus-button.png", array("alt" => "Delete")),
				"/equipements/delete/".$equipement['Equipement']['id'],
				array('escape' => false),
				"Se va a eliminar este Equipo. &iquest;Est&aacute; seguro?"
			);
			$tr = array (
				$html->link(
					$equipement['Equipement']['name'],
					'/equipements/'.$equipement['Equipement']['id']
				),
				$equipement['Location']['name'],
				array($actions, array('class' => 'alignright')),
			);
			$oddTrOptions = array('class' => 'odd');
			$evenTrOptions = array('class' => 'even');
			echo $html->tableCells($tr, $oddTrOptions, $evenTrOptions);
		}
		?>
	</table>
	<?php echo $this->Paginator->numbers(); ?>
</div>