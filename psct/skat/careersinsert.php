<?php
	$careers = array('actor/actress','astronaut','athlete','author','banker','civil servant','detective','doctor','engineer','entrepreneur','estate agent','farmer','firefighter','hairdresser','judge','lawyer','librarian','game tester','mechanic','nurse','pilot','politician','shopkeeper','soldier','surveyor','teacher','technician','tennis player','vet','zoologist');
	
	include('../connect.php');

	$conn = connect();
	
	$stmt = $conn -> prepare("INSERT INTO careers_list(id) VALUES(:id);");
	
	foreach($careers as $id) {
		$stmt -> execute([':id' => $id]);
	}
 ?>