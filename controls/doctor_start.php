<?php

include 'libraries/patient.class.php';
$patientsObj = new patients();

if(!empty($id)) {
	$patientsObj->startAppointment($id);
	common::redirect("index.php?module={$module}&action=list");
	die();
}

?>