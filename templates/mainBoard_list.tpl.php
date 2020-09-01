<meta http-equiv="refresh" content="5" >
<ul id="reportInfo">
	<li class="title">Incoming appointments</li>
	<li>Date and time: <span><?php echo date("Y-m-d H:i"); ?></span></li>
</ul>

<?php
	if(sizeof($postData) > 0) { ?>
		<table class="reportTable">
			<tr>
				<th style="width: 50%";>ID</th>
				<th>Status</th>
			</tr>

			<?php
				$count = 0;
				for($i = 0; $i < sizeof($postData); $i++) {
					
					if($i == 0 || $postData[$i]['doctorsID'] != $postData[$i-1]['doctorsID']) {
						$count = 0;
						echo
							  "<tr>"
								. "<td class='groupSeparator' colspan='5'>{$postData[$i]['firstName']} {$postData[$i]['lastName']}</td>"
							. "</tr>";
					}
					
					if($count < 5)
					{
						
						echo
						"<tr>"
							. "<td>{$postData[$i]['ID']}</td>"
							. "<td>{$postData[$i]['status']}</td>"
						. "</tr>";
						if($postData[$i]['status'] == 'Waiting')
						{
							$count += 1;
						}
						
					}
					
					
				}
			?>


		  	
		</table>
<?php   
	} else {
?>
		<div class="warningBox">
			No registered appointments.
		</div>
<?php
	}
?>

<form action="" method ="POST">
<p><input type="submit" class="submit button float-left" name="submit2" value="Log Out"></p>
	</form>
