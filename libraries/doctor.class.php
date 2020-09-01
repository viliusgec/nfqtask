<?php

class doctors {
	
	private $doctors_table = '';
	private $patients_table = '';

	
	public function __construct() {
		$this->doctors_table = config::DB_PREFIX . 'doctors';
		$this->patients_table = config::DB_PREFIX . 'patients';
	}
	

	
	/**
	 * Miesto sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getDoctorList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
			
			if(isset($offset)) {
				$limitOffsetString .= " OFFSET {$offset}";
			}	
		}
		
		$query = "  SELECT *
					FROM {$this->doctors_table}{$limitOffsetString}";
		$data = mysql::select($query);
		
		return $data;
	}

	

	public function getDoctorsPatientList($id) {
		$query = "  SELECT  *
					FROM `{$this->doctors_table}`
						INNER JOIN `{$this->patients_table}`
							ON  `{$this->patients_table}`.`doctorsID`=`{$this->doctors_table}`.`employeeID`
					WHERE `{$this->patients_table}`.`doctorsID`='{$id}' 
					ORDER BY `{$this->doctors_table}`.`employeeID`, `{$this->patients_table}`.`status` ASC";
		$data = mysql::select($query);
		return $data;
	}

	public function getDoctorsAppointmentList(){

		$query = " SELECT `{$this->patients_table}`.`ID`,
							`{$this->patients_table}`.`status`,
		 					`{$this->patients_table}`.`doctorsID`,
							`{$this->doctors_table}`.`firstName`,
							`{$this->doctors_table}`.`lastName`,
							`{$this->doctors_table}`.`employeeID`
 				FROM `{$this->doctors_table}`
	 			INNER JOIN `{$this->patients_table}`
				ON `{$this->patients_table}`.`doctorsID`=`{$this->doctors_table}`.`employeeID`
				WHERE `{$this->patients_table}`.`status`!='Ended'
			GROUP BY `{$this->patients_table}`.`ID` ORDER BY `{$this->doctors_table}`.`employeeID`, `{$this->patients_table}`.`status` ASC";
		$data = mysql::select($query);

		return $data;
	 }

	 public function checkLogIn($ID, $pass)
	 {
		$query = "  SELECT COUNT(`{$this->doctors_table}`.`employeeID`) as `count`
					FROM `{$this->doctors_table}`
					WHERE `{$this->doctors_table}`.`employeeID`='{$ID}'
					AND `{$this->doctors_table}`.`password`='{$pass}'";
		$data = mysql::select($query);
		
		return $data[0]['count'];
	 }
}
