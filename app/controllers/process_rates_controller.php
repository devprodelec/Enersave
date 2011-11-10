<?php

class ProcessRatesController extends AppController {
	
	function index() {
		$process_rates = $this->ProcessRate->find('all');
		$this->set(compact('process_rates'));
	}
	
	function view($process_rate_id = null) {
		$this->data = $this->ProcessRate->findById($census_id);
	}
	
	function add($equipement_id = null) {
		if(!empty($this->data)) {
			if($this->ProcessRate->save($this->data)) {
				$this->redirect('/equipements/edit/'.$equipement_id);
			}
		}
		$processes = $this->ProcessRate->Process->find('list');
		$this->set(compact('equipement_id', 'processes'));
	}
	
	function edit($equipement_id = null, $process_rate_id = null) {
		if(empty($this->data)) {
			$this->data = $this->ProcessRate->findById($process_rate_id);
			$processes = $this->ProcessRate->Process->find('list');
			$this->set(compact('equipement_id', 'process_rate_id', 'processes'));
		} else if($this->ProcessRate->save($this->data)) {
			$this->redirect('/equipements/edit/'.$equipement_id);
		}
	}
	
	function delete($equipement_id = null, $process_rate_id = null) {
		if($this->ProcessRate->delete($process_rate_id)) {
			$this->redirect('/equipements/edit/'.$equipement_id);
		}
	}
}

?>