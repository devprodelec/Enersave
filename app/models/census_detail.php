<?php

class CensusDetail extends AppModel {
	var $belongsTo = array('Census', 'Equipement');
	var $virtualFields = array('consumption' => "quantity * power * hours_per_day * days_per_month");
}

?>