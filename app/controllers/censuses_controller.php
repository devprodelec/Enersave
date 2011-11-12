<?php

class CensusesController extends AppController {
	
	function index() {
		$censuses = $this->Census->find('all');
		$this->set(compact('censuses'));
	}
	
	function view() {
		$census_id = $this->params['id'];
		$this->Census->recursive = 2;

		$fields = array('Equipement.location_id',
			'SUM(quantity) as quantity',
			'SUM(quantity * power * hours_per_day * days_per_month) as consumption'); 
		$conditions = array('census_id' => $census_id);
		$group = array('Equipement.location_id');
		$params = compact('fields', 'conditions', 'group');
		$subtotals = $this->Census->CensusDetail->find('all', $params);
		
		$totals = array();
		$totals['consumption'] = 0;
		$totals['quantity'] = 0;
		$subtotcomp = array();
		$subtotqty = array();
		foreach($subtotals as $sub) {
			$subtotcomp[$sub['Equipement']['location_id']] = $sub[0]['consumption'];
			$subtotqty[$sub['Equipement']['location_id']] = $sub[0]['quantity'];
			$totals['consumption'] += $sub[0]['consumption'];
			$totals['quantity'] += $sub[0]['quantity'];
		}
		
		$subtotperc = array();
		$locations = array();
		foreach($subtotcomp as $key => $sub) {
			$subtotperc[$key] = ($subtotcomp[$key] / $totals['consumption']) * 100;
			$locations[$key]['totals'] = array('quantity' => $subtotqty[$key],
											   'consumption' => $subtotcomp[$key],
											   'percent_area' => 100,
											   'percent_total' => $subtotperc[$key]);
			$locations[$key]['details'] = array();
		}
		
		$census = $this->Census->findById($census_id);
		foreach($census['CensusDetail'] as $i => $details) {
			$location_id = $details['Equipement']['location_id'];
			$census['CensusDetail'][$i]['percent_area'] = ($details['consumption'] / $subtotcomp[$location_id]) * 100;
			$census['CensusDetail'][$i]['percent_total'] = ($details['consumption'] / $totals['consumption']) * 100;
			$locations[$location_id]['details'][] = $census['CensusDetail'][$i];
		}
		
		$this->set(compact('census_id', 'census', 'locations', 'totals'));
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