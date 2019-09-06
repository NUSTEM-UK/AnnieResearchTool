<?php
	// Connect to DB
	include('../../src/connect.phpconnect.php');

	$conn = connect();

	// Returns list of careers top dynamically create cards
	$sql = 'SELECT * FROM attrib_list;';
    foreach($conn -> query($sql) as $row) {
		echo $row['id'].',';
    }
?>