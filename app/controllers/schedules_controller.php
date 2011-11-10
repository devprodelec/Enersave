<?php

class SchedulesController extends AppController {

	function index() {
		$weekdays = array();
		for($i = 1; $i <= 7; $i++) {
			$scheduleList = $this->Schedule->findAllByProcWeekday($i);
			$schedules = array();
			foreach($scheduleList as $key => $schedule) {
				$exists = false;
				$index = count($schedules);
				foreach($schedules as $idx => $sch) {
					
					if( $sch['Process']['id'] == $schedule['Process']['id'] &&
							$sch['EntryWeekday']['id'] == $schedule['EntryWeekday']['id']) {
						$exists = true;
						$index = $idx;
						break;
					}
				}
				if(!$exists) {
					$schedules[] = $schedule;
					$color_marks = array();
				} else {
					$color_marks = $schedules[$index]['ColorMarks'];
				}
				for($j = 0; $j < 24; $j++) {
					if($j >= intval($schedule['Schedule']['proc_hour_start']) &&
							$j <= intval($schedule['Schedule']['proc_hour_end'])) {
						$color_marks[$j] = $this->color_mark($schedule['EntryWeekday']['id']);
					} else if(!$exists) {
						$color_marks[$j] = "";
					}
				}
				$schedules[$index]['ColorMarks'] = $color_marks;
			}
			$weekdays[$i] = array(
				'weekday' => $this->Schedule->EntryWeekday->findById($i),
				'schedules' => $schedules
			);
		}
		$this->set(compact('weekdays'));
	}

	function process($process_id = null) {
		$process = $this->Schedule->Process->findById($process_id);
		$conditions = array('Process.id' => $process_id);
		$recursive = 2;
		$params = compact('conditions', 'recursive');
		$schedules = $this->Schedule->find('all', $params);
		$this->set(compact('process_id', 'process', 'schedules'));
	}
	
	function add($process_id = null) {
		if(!empty($this->data)) {
			$this->Schedule->create();
			if($this->Schedule->save($this->data)) {
				$this->redirect('process/'.$process_id);
			}
		}
		$weekday_list = $this->Schedule->EntryWeekday->find('list');
		$this->set('entryWeekdays', $weekday_list);
		$this->set('procWeekdays', $weekday_list);
		$this->set(compact('process_id'));
	}
	
	function edit($schedule_id = null) {
		if(!empty($this->data)) {
			if($this->Schedule->save($this->data)) {
				$this->redirect('process/'.$this->data['Schedule']['process_id']);
			}
		}
		$weekday_list = $this->Schedule->EntryWeekday->find('list');
		$this->set('entryWeekdays', $weekday_list);
		$this->set('procWeekdays', $weekday_list);
		$this->set(compact('schedule_id'));
		$this->data = $this->Schedule->findById($schedule_id);
	}
	
	function delete($schedule_id = null, $process_id) {
		if($this->Schedule->delete($schedule_id)) {
			$this->redirect('process/'.$process_id);
		}
	}
	
	function color_mark($weekday) {
		switch($weekday) {
			case 1: return "l"; break;
			case 2: return "m"; break;
			case 3: return "i"; break;
			case 4: return "j"; break;
			case 5: return "v"; break;
			case 6: return "s"; break;
			case 7: return "d"; break;
			default: return "";
		}
	}
}

?>