<?php

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

	if(empty($_POST['submit'])) {
		include 'templates/appointment_log.tpl.php';
	}
	else{
	include 'utils/validator.class.php';
	$validator = new validator($validations, $required, $maxLengths);
	if($validator->validate($_POST)) {
		$data2 = $validator->preparePostFieldsForSQL();

		$data = $patientsObj->appointmentInfo($data2['ID'], $data2['personalNum']);

		if(!empty($data))
		{
			foreach($data as $key => $val)
        	{
            	$num = $patientsObj->numberInLine($val['date'], $val['doctorsID']) + 1;
            	date_default_timezone_set('Europe/Vilnius');
            
        		$now = date('Y-m-d H:i');
            	$x = new DateTime($val['date']);
				$y = new DateTime($now);
			
				if($x < $y)
				{
					$estimatedTime = "0";
				}
				else
				{
					$x = $x->diff($y);
					if($x->format("%Y") > 0) $estimatedTime = $x->format("%Y years %M months %D days %H hours %I minutes");
					else if ($x->format("%M") > 0) $estimatedTime = $x->format("%M months %D days %H hours %I minutes");
					else if ($x->format("%D") > 0) $estimatedTime = $x->format("%D days %H hours %I minutes");
					else if ($x->format("%H") > 0) $estimatedTime = $x->format("%H hours %I minutes");
					else if ($x->format("%I") > 0) $estimatedTime = $x->format("%I minutes");
				}
      		} 
        	include 'templates/appointment_info.tpl.php';
			die();
		}
		else{
			$dateErrors = "Invalid credentials";
			include 'templates/appointment_log.tpl.php';
		}
        
	} else {
		$formErrors = $validator->getErrorHTML();
		$data = $_POST;
		include 'templates/appointment_log.tpl.php';
	}

	} 
