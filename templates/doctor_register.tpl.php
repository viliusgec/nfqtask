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
            
			<div class="errorBox2"> Sorry, your password was incorrect. </div>
	<?php } ?>
	<form action="" method="post">
		<fieldset>
			<legend>Log in credentials</legend>
			<p><label class="field" for="firstName">Employee ID</label><input type="text" id="employeeID" name="employeeID" class="textbox textbox-100"  value="<?php echo isset($data['employeeID']) ? $data['employeeID'] : ''; ?> "/></p>
			<p><label class="field" for="password">Password</label><input type="password" id="password" name="password" class="textbox textbox-100" /></p>
		</fieldset>
		<p><input type="submit" class="submit button float-left" name="submit" value="Submit"></p>
	</form>
</div>