<?php

class CensusDetailsController extends AppController {
	
	function index() {
		$census_details = $this->CensusDetail->find('all');
		$this->set(compact('census_details'));
	}
	
	function view($census_detail_id = null) {
		$this->data = $this->CensusDetail->findById($census_id);
	}
	
	function add($census_id = null) {
		if(!empty($this->data)) {
			if($this->CensusDetail->save($this->data)) {
				$this->redirect('/censuses/'.$census_id);
			}
		}
		$locations = $this->CensusDetail->Equipement->Location->find('list');
		$this->set(compact('census_id', 'locations'));
	}
	
	function edit($census_detail_id = null) {
		if(empty($this->data)) {
			$this->data = $this->CensusDetail->findById($census_detail_id);
			$locations = $this->CensusDetail->Equipement->Location->find('list');
			$census_id = $this->data['CensusDetail']['census_id'];
			$location_id = $this->data['Equipement']['location_id'];
			$conditions = array('location_id' => $location_id);
			$params = compact('conditions');
			$equipements = $this->CensusDetail->Equipement->find('list', $params);
			$this->set(compact('census_detail_id', 'census_id', 'location_id', 'locations', 'equipements'));
		} else if($this->CensusDetail->save($this->data)) {
			$this->redirect('/census_details');
		}
	}
	
	function delete($census_detail_id = null) {
		if($this->CensusDetail->delete($census_detail_id)) {
			$this->redirect('/census_details');
		}
	}
	
	function ajax_equipements() {
		$this->layout = 'ajax';
		debug($this->data);
		$location_id = $this->data['CensusDetail']['location_id'];
		if(!empty($location_id)) {
			$conditions = array('location_id' => $location_id);
			$params = compact('conditions');
			$options = $this->CensusDetail->Equipement->find('list', $params);
			$this->set(compact('options'));
		}
		$this->render('/elements/ajax/select_options');
	}
	
	function census($census_id = null, $location_id = null) {
		$location = $this->CensusDetail->Equipement->Location->findById($location_id);
		$conditions = array('Census.id' => $census_id);
		$recursive = 2;
		$params = compact('conditions', 'recursive');
		$census_details = $this->CensusDetail->find('all', $params);
		$this->set(compact('census_id', 'location_id', 'census_details', 'location'));
	}
}

?>