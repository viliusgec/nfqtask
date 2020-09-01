<?php
include 'libraries/patient.class.php';
$patientsObj = new patients();

include 'libraries/doctor.class.php';
$postsObj = new doctors();
$formSubmitted = false;
$formErrors = null;
$dateErrors = null;
$data = array();
$required = array('PersonalNumber', 'FirstName', 'LastName', 'DateAndTime', 'Doctor');
$maxLengths = array (
	'PersonalNumber' => 10,
	'FirstName' => 20,
	'LastName' => 20,
	'DateAndTime' => 20
);
$validations = array (
	'PersonalNumber' => 'int',
	'FirstName' => 'words',
	'LastName' => 'words',
	'DateAndTime' => 'datetime',
	'Doctor'=> 'anything'
);

if(empty($_POST['submit'])) {
	include 'templates/appointment_register.tpl.php';
}
else{
	$formSubmitted = true;
	include 'utils/validator.class.php';
	$validator = new validator($validations, $required, $maxLengths);

	if($validator->validate($_POST)) {
		$dataPrepared = $validator->preparePostFieldsForSQL();

		$now = date('Y-m-d H:i');
		$x = new DateTime($dataPrepared['DateAndTime']);
		$y = new DateTime($now);

		if($x < $y)
		{
			$dateErrors = "0";
			$data = $_POST;
			include 'templates/appointment_register.tpl.php';
		}
		else {

			$patientsObj->insertPost($dataPrepared);
			$data = $patientsObj->getAppointment($dataPrepared);
			foreach($data as $key => $val)
        	{
            	$num = $patientsObj->numberInLine($val['date'], $val['doctorsID']) + 1;
            	date_default_timezone_set('Europe/Vilnius');     
			} 
			
				$x = $x->diff($y);
				if($x->format("%Y") > 0) $estimatedTime = $x->format("%Y years %M months %D days %H hours %I minutes");
				else if ($x->format("%M") > 0) $estimatedTime = $x->format("%M months %D days %H hours %I minutes");
				else if ($x->format("%D") > 0) $estimatedTime = $x->format("%D days %H hours %I minutes");
				else if ($x->format("%H") > 0) $estimatedTime = $x->format("%H hours %I minutes");
				else if ($x->format("%I") > 0) $estimatedTime = $x->format("%I minutes");
			
			include 'templates/appointment_info.tpl.php';
			die();
		}

		
	} else {
		$formErrors = $validator->getErrorHTML();
		$data = $_POST;
		include 'templates/appointment_register.tpl.php';
	}
	
} 




?>
