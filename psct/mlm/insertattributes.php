<?php
	$attribs = array('Clever', 'Creative', 'Patient', 'Brave', 'Helpful', 'Fun', 'Friendly', 'Curious', 'Hardworking');
	
	include('../connect.php');

	$conn = connect();
	
	$stmt = $conn -> prepare("INSERT INTO attrib_list(id) VALUES(:id);");
	
	foreach($attribs as $id) {
		$stmt -> execute([':id' => $id]);
	}
 ?>

