<?php

include 'libraries/patient.class.php';
$patientsObj = new patients();

if(!empty($id)) {
		$patientsObj->deleteAppointment($id);

	common::redirect("index.php?module={$module}&action=list{$removeErrorParameter}");
	die();
}

?>