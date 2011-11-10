<?php

class CensusesController extends AppController {
	
	function index() {
		$censuses = $this->Census->find('all');
		$this->set(compact('censuses'));
	}
	
	function view() {
		$census_id = $this->params['id'];
		$this->Census->recursive = 2;
		$this->data = $this->Census->findById($census_id);
		$this->set(compact('census_id'));
	}
	
	function add() {
		if(!empty($this->data)) {
			if($this->Census->save($this->data)) {
				$this->redirect('/censuses');
			}
		}
	}
	
	function edit($census_id = null) {
		if(empty($this->data)) {
			$this->data = $this->Census->findById($census_id);
		} else if($this->Census->save($this->data)) {
			$this->redirect('/censuses');
		}
		$this->set(compact('census_id'));
	}
	
	function delete($census_id = null) {
		if($this->Census->delete($census_id)) {
			$this->redirect('/censuses');
		}
	}
}

?>