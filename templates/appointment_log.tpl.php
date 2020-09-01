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
            
			<div class="errorBox2"> No registered appointment. </div>
	<?php } ?>

	<form action="" method="post">
		<fieldset>
			<legend>Log in credentials</legend>
            <p><label class="field" for="AppointmentID">Appointment ID</label><input type="text" id="ID" name="ID" class="textbox textbox-100" /></p>
			<p><label class="field" for="PersonalNum">Personal number</label><input type="text" id="personalNum" name="personalNum" class="textbox textbox-100" /></p>
		</fieldset>
		<p><input type="submit" class="submit button float-left" name="submit" value="Submit"></p>
	</form>
</div>