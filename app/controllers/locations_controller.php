<?php

class LocationsController extends AppController {
	
	function index() {
		$locations = $this->Location->find('all');
		$this->set(compact('locations'));
	}
	
	function view($location_id = null) {
		$this->data = $this->Location->findById($location_id);
	}
	
	function add() {
		if(!empty($this->data)) {
			if($this->Location->save($this->data)) {
				$this->redirect('/locations');
			}
		}
	}
	
	function edit($location_id = null) {
		$this->set(compact('location_id'));
		if(empty($this->data)) {
			$this->data = $this->Location->findById($location_id);
		} else if($this->Location->save($this->data)) {
			$this->redirect('/locations');
		}
	}
	
	function delete($location_id = null) {
		if($this->Location->delete($location_id)) {
			$this->redirect('/locations');
		}
	}
}

?>