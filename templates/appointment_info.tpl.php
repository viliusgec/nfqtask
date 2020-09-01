<div id="formContainer">
<table style="width: 85%" class="listTable">
	<tr>
		<th>ID</th>
		<th>Position</th>
		<th>Estimated time left</th>
		<th></th>
	</tr>
	<?php
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['ID']}</td>"
					. "<td>{$num}</td>" 
                    . "<td>{$estimatedTime}</td>"
                    . "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['ID']}\");' title=''>Cancel your appointment</a>"
			        . "</td>"
                . "</tr>";   
		}
		echo "Do not forget your ID!"
	?>
</table>

</div>