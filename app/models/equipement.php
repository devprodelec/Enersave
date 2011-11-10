<?php

class Equipement extends AppModel {
	var $belongsTo = array('Location');
	var $hasMany = array('ProcessRate');
	var $order = "Equipement.name";
}

?>