<?php

include 'libraries/doctor.class.php';
$doctorsObj = new doctors();

include 'libraries/patient.class.php';
$patientsObj = new patients();
$formErrors = null;
$dateErrors = null;
	$required = array('ID', 'personalNum');
	$maxLengths = array (
		'ID' => 10,
		'personalNum' => 20
	);
	$validations = array (
		'ID' => 'int',
		'personalNum' => 'int'
	);

	if(empty($_POST['submit']) && empty($_SESSION["appID"])) {
		include 'templates/appointment_log.tpl.php';
    }
    else if (!empty($_SESSION['appID']))
    {
        $postData = $doctorsObj->getDoctorsAppointmentList();
            include 'templates/mainBoard_list.tpl.php';
    }
	else{
	include 'utils/validator.class.php';
	$validator = new validator($validations, $required, $maxLengths);
	if($validator->validate($_POST)) {
		$data2 = $validator->preparePostFieldsForSQL();

        $data = $patientsObj->appointmentInfo($data2['ID'], $data2['personalNum']);

        if(!empty($data))
        {
            $postData = $doctorsObj->getDoctorsAppointmentList();
            $_SESSION["appID"] = $data2['ID'];
            include 'templates/mainBoard_list.tpl.php';
		}
		else
		{
			$dateErrors = "Invalid credentials";
			include 'templates/appointment_log.tpl.php';
		}
		die();
	} else {
		$formErrors = $validator->getErrorHTML();
		$data = $_POST;
		include 'templates/appointment_log.tpl.php';
		}
	} 
	if(!empty($_POST['submit2']))
		{
			session_unset();
			common::redirect("index.php?module={$module}&action=list");
		}

