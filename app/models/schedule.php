<?php

class Schedule extends AppModel {
	var $belongsTo = array(
		'Process',
		'EntryWeekday' => array('className' => 'Weekday', 'foreignKey' => 'entry_weekday'),
		'ProcWeekday' => array('className' => 'Weekday', 'foreignKey' => 'proc_weekday'),
	);
}

?>