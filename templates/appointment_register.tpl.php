<div class="float-clear"></div>
<div id="formContainer">
	<?php if($formErrors != null) { ?>
            <div class="errorBox">
			Fill required fields correctly:
			<?php 
				echo $formErrors;
			?>
            </div>
	<?php } ?>
	<?php if($dateErrors != null) { ?>
            
			<div class="errorBox2"> Please choose future date and time </div>
	<?php } ?>
	<form action="" method="post">
	<fieldset>
			<legend>Register appointment</legend>
			<p>
				<label class="field" for="doctor">Doctor</label>
				<select id="employeeID" name="Doctor">
					<?php
						
						$cities = $postsObj->getDoctorList();
						foreach($cities as $key => $val) {
							$selected = "";
							echo "<option{$selected} value='{$val['employeeID']}'>{$val['firstName']} {$val['lastName']} {$val['profession']}</option>";
						}
					?>
				</select>
			</p>
			<p>
            <label class="field" for="personalNum">Personal Number<?php echo in_array('personalNum', $required) ? '<span> *</span>' : ''; ?></label>
                <input type="text" id="personalNum" name="PersonalNumber" class="textbox textbox-150" value="<?php echo isset($data['PersonalNumber']) ? $data['PersonalNumber'] : ''; ?>"></p>
			<p>
            <label class="field" for="firstName">First name</label>
                <input type="text" id="firstName" name="FirstName" class="textbox textbox-150" value="<?php echo isset($data['FirstName']) ? $data['FirstName'] : ''; ?>"></p>
			 <p>
            <label class="field" for="lastName">Last name</label>
                <input type="text" id="lastName" name="LastName" class="textbox textbox-150" value="<?php echo isset($data['LastName']) ? $data['LastName'] : ''; ?>"></p>
				<p>
            <label class="field" for="date">Date and Time</label>
                <input type="text" id="dateT" name="DateAndTime" class="textbox textbox-150 datetime" value="<?php echo isset($data['DateAndTime']) ? $data['DateAndTime'] : ''; ?>"></p>
		
		</fieldset>
		<p>
			<input type="submit" class="submit button" name="submit" value="Submit">
		</p>
	</form>
</div>