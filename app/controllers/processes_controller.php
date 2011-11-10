<?php

class ProcessesController extends AppController {
	
	function index() {
		$processes = $this->Process->find('all');
		$this->set(compact('processes'));
	}
	
	function view($process_id = null) {
		$this->data = $this->Process->findById($process_id);
	}
	
	function add() {
		if(!empty($this->data)) {
			if($this->Process->save($this->data)) {
				$this->redirect('/processes');
			}
		}
	}
	
	function edit($process_id = null) {
		$this->set(compact('process_id'));
		if(empty($this->data)) {
			$this->data = $this->Process->findById($process_id);
		} else if($this->Process->save($this->data)) {
			$this->redirect('/processes');
		}
	}
	
	function delete($process_id = null) {
		if($this->Process->delete($process_id)) {
			$this->redirect('/processes');
		}
	}
}

?>