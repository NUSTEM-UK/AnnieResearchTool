<?php
	$careers = array('ac' => 'actor/actress','ar' => 'architect','at' => 'artist','au' => 'author','ba' => 'bank assistant','bu' => 'builder','cw' => 'care worker','ch' => 'chef/cook','cp' => 'computer programmer','dd' => 'delivery driver','do' => 'doctor','en' => 'engineer','fw' => 'factory worker','fd' => 'fashion designer','hd' => 'hairdresser','la' => 'lawyer','ma' => 'manager','me' => 'mechanic','nu' => 'nurse','ow' => 'office worker','pi' => 'pilot','po' => 'police officer','sc' => 'scientist','sa' => 'shop assistant','sw' => 'social worker','sp' => 'sports coach','te' => 'teacher','tc' => 'technician','ve' => 'vet','wa' => 'waiter/waitress');
	
	include('./scgames/connect.php');

	$conn = connect();
	
	$stmt = $conn -> prepare("INSERT INTO careers_list(id, careers) VALUES(:id, :careers);");
	
	foreach($careers as $key => $value) {
		$stmt -> execute([':id' => $key, ':careers' => $value]);
	}
 ?>