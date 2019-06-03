<?php
	// Connect to DB
	include('../connect.php');

	$conn = connect();

	// Returns list of careers top dynamically create cards
	$sql = 'SELECT * FROM careers_list;';
    foreach($conn -> query($sql) as $row) {
		echo $row['id'].',';
		echo $row['careers'].'%';
    }
?>