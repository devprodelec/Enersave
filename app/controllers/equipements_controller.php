<?php

class EquipementsController extends AppController {
	
	var $paginate = array(
		'limit' => 20,
		'order' => array(
			'Location.id' => 'asc'
		)
	);

	function index() {
		$equipements = $this->paginate('Equipement');
		$this->set(compact('equipements'));
	}
	
	function view($equipement_id = null) {
		$this->data = $this->Equipement->findById($equipement_id);
	}
	
	function add() {
		if(!empty($this->data)) {
			if($this->Equipement->save($this->data)) {
				$this->redirect('/equipements');
			}
		}
		$this->set('locations', $this->Equipement->Location->find('list'));
	}
	
	function edit($equipement_id = null) {
		$this->set(compact('equipement_id'));
		if(empty($this->data)) {
			$this->Equipement->recursive = 2;
			$this->data = $this->Equipement->findById($equipement_id);
		} else if($this->Equipement->save($this->data)) {
			$this->redirect('/equipements');
		}
		$this->set('locations', $this->Equipement->Location->find('list'));
	}
	
	function delete($equipement_id = null) {
		if($this->Equipement->delete($equipement_id)) {
			$this->redirect('/equipements');
		}
	}
}

?>