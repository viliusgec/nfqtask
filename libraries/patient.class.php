<?php

class patients {
	
	private $patients_table = '';
	
	public function __construct() {
		$this->patients_table = config::DB_PREFIX . 'patients';
	}
	


	/**
	 * Punkto įrašymas
	 * @param type $data
	 */
	public function insertPost($data) {
		$query = "  INSERT INTO `{$this->patients_table}`
								(
									`firstName`,
									`lastName`,
                                    `personalNum`,
                                    `doctorsID`,
									`date`,
									`status`
								)
								VALUES
								(
									'{$data['FirstName']}',
									'{$data['LastName']}',
                                    '{$data['PersonalNumber']}',
									'{$data['Doctor']}',
									'{$data['DateAndTime']}',
									'Waiting'
								)";
		mysql::query($query);
	}

	/**
	 * Darbuotojo šalinimas
	 * @param type $id
	 */
	public function deleteAppointment($id) {
		$query = "  DELETE FROM `{$this->patients_table}`
					WHERE `ID`='{$id}'";
		mysql::query($query);
	}

	/**
	 * Darbuotojo atnaujinimas
	 * @param type $data
	 */
	public function startAppointment($id) {
		$query = "  UPDATE `{$this->patients_table}`
					SET     `status`='Started'
					WHERE `ID`='{$id}'";
		mysql::query($query);
	}

	public function endAppointment($id) {
		$query = "  UPDATE `{$this->patients_table}`
					SET     `status`='Ended'
					WHERE `ID`='{$id}'";
		mysql::query($query);
	}

	public function appointmentInfo($ID, $personalNum) {
		$query = "  SELECT  *
					FROM `{$this->patients_table}`
					WHERE `{$this->patients_table}`.`ID`='{$ID}' 
					AND `{$this->patients_table}`.`personalNum`='{$personalNum}'";
		$data = mysql::select($query);
		return $data;
	}

	public function numberInLine($ID, $doctorsID) {
		$query = "  SELECT COUNT(`{$this->patients_table}`.`ID`) as `count`
					FROM `{$this->patients_table}`
					WHERE `{$this->patients_table}`.`date`<'{$ID}'
					AND `{$this->patients_table}`.`doctorsID`='{$doctorsID}'
					AND `{$this->patients_table}`.`status`='Waiting'";
		$data = mysql::select($query);
		
		return $data[0]['count'];
	}

	public function getAppointment($data) {
		$query = "  SELECT  *
					FROM `{$this->patients_table}`
					WHERE `{$this->patients_table}`.`personalNum`='{$data['PersonalNumber']}' 
					AND `{$this->patients_table}`.`date`='{$data['DateAndTime']}'
					AND `{$this->patients_table}`.`doctorsID`='{$data['Doctor']}'";
		$data = mysql::select($query);
		return $data;
	}

}