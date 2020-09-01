<table class="listTable">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Last name</th>
		<th></th>
	</tr>
	<?php
		$a = 0;
		foreach($data as $key => $val) {
			if($val['status']=='Waiting' && $a == 0)
			{
				echo
				"<tr>"
					. "<td>{$val['ID']}</td>"
					. "<td>{$val['firstName']}</td>" 
					. "<td>{$val['lastName']}</td>"
					. "<td>"
						. "<a href='index.php?module={$module}&action=start&id={$val['ID']}' title=''>Start</a>&nbsp;"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['ID']}\"); return false;' title=''>Cancel</a>"
					. "</td>"
				. "</tr>";
			}	
			else if ($val['status']=='Waiting' && $a > 0)
			{
				echo
				"<tr>"
					. "<td>{$val['ID']}</td>"
					. "<td>{$val['firstName']}</td>" 
					. "<td>{$val['lastName']}</td>"
					. "<td>"
						. "<a href='#' onclick='showErrorDialog(); return false;' title=''>Start</a>&nbsp;"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['ID']}\"); return false;' title=''>Cancel</a>"
					. "</td>"
				. "</tr>";
			}	
			else if($val['status']=='Started')
			{
				$a +=1;
				echo
				"<tr>"
					. "<td>{$val['ID']}</td>"	
					. "<td>{$val['firstName']}</td>" 
					. "<td>{$val['lastName']}</td>"
					. "<td>"
						. "<a href='index.php?module={$module}&action=end&id={$val['ID']}' title=''>End</a>&nbsp;"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['ID']}\"); return false;' title=''>Cancel</a>"
					. "</td>"
				. "</tr>";
			}
		}
	?>
	
</table>
<form action="" method ="POST">
<p><input type="submit" class="submit button float-left" name="submit" value="Log Out"></p>
	</form>


