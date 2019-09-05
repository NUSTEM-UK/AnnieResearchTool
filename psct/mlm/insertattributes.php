<?php
	$attribs = array('Clever', 'Creative', 'Sensible', 'Strange', 'Kind', 'Fun', 'Friendly', 'Cool', 'Hardworking');
	
	include('../connect.php');

	$conn = connect();
	
	$stmt = $conn -> prepare("INSERT INTO attrib_list(id) VALUES(:id);");
	
	foreach($attribs as $id) {
		$stmt -> execute([':id' => $id]);
	}
 ?>

