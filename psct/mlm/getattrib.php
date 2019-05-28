<?php
	include('../connect.php');

	$conn = connect();

	$sql = 'SELECT * FROM attrib_list;';
    foreach($conn -> query($sql) as $row) {
		echo $row['id'].',';
    }
?>