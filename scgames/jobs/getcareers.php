<?php
	include('../connect.php');

	$conn = connect();

	$sql = 'SELECT * FROM careers_list;';
    foreach($conn -> query($sql) as $row) {
		echo $row['id'].',';
		echo $row['careers'].'%';
    }
?>