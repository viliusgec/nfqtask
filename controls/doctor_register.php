<?php

	include 'libraries/patient.class.php';
	$patientsObj = new patients();
	include 'libraries/doctor.class.php';
 	$doctorsObj = new doctors();
	 $formErrors = null;
	 $dateErrors = null;
	$required = array('employeeID', 'password');

	$maxLengths = array (
		'employeeID' => 20,
		'password' => 20
	);
	$validations = array (
		'employeeID' => 'int',
		'password' => 'anything'
	);
	if(empty($_POST['submit']) && empty($_SESSION['userID'])) {
		include 'templates/doctor_register.tpl.php';
    }
    else if(!empty($_SESSION["userID"]))
    {
        common::redirect("index.php?module={$module}&action=list");
    }
	else{
		include 'utils/validator.class.php';
		$validator = new validator($validations, $required, $maxLengths);
		if($validator->validate($_POST)) {
         	$data2 = $validator->preparePostFieldsForSQL();
         	$data = $doctorsObj->checkLogIn($data2['employeeID'], $data2['password']);
         	if($data > 0)
         	{
            	$_SESSION["userID"] = $data2['employeeID'];
            	common::redirect("index.php?module={$module}&action=list");
         	}
        	else {
            	
				$dateErrors = "Invalid credentials";
				include 'templates/doctor_register.tpl.php';
         	}
		} 
		else {
		$formErrors = $validator->getErrorHTML();
		$data = $_POST;
		include 'templates/doctor_register.tpl.php';
		}
	} 
