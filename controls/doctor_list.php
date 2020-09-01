<?php

	include 'libraries/patient.class.php';
	$patientsObj = new patients();
	include 'libraries/doctor.class.php';
 	$doctorsObj = new doctors();

	 if(empty($_SESSION["userID"]))
	 {
		common::redirect("index.php?module={$module}&action=register");
	 }
	 else
	 {
		$data = $doctorsObj->getDoctorsPatientList($_SESSION['userID']);
		include 'templates/patient_list.tpl.php';
		if(!empty($_POST['submit']))
		{
			session_unset();
			common::redirect("index.php?module={$module}&action=register");
		}
	 }