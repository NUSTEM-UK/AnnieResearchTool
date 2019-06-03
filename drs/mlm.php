<?php
	// Connect to BD
	include('connect.php');

	$headers = array('id','meclever','mecreative','mepatient','mebrave','mehelpful','mefun','mefriendly','mecurious','mehardworking','sciclever','scicreative','scipatient','scibrave','scihelpful','scifun','scifriendly','scicurious','scihardworking','timestamp');
	$data = array();

	$conn = connect();

    foreach($ratings as $id) {
		$feedback[$id] = array(0,0,0,0,0,0,0,0,0,0);
    }

    // Selects all data in DB
    $sql = "SELECT * FROM attrib ORDER BY 'timestamp';";
    foreach($conn -> query($sql) as $row) {
    	array_push($data,array(
    		$row['id'],
	    	$row['meclever'],
	    	$row['mecreative'],
	    	$row['mepatient'],
	    	$row['mebrave'],
	    	$row['mehelpful'],
	    	$row['mefun'],
	    	$row['mefriendly'],
	    	$row['mecurious'],
	    	$row['mehardworking'],
	    	$row['sciclever'],
	    	$row['scicreative'],
	    	$row['scipatient'],
	    	$row['scibrave'],
	    	$row['scihelpful'],
	    	$row['scifun'],
	    	$row['scifriendly'],
	    	$row['scicurious'],
	    	$row['scihardworking'],
	    	$row['timestamp']));
    }

    // Return data in CVS format to download
	echo implode(",", $headers)."\r\n";

	foreach ($data as $values) {
		echo implode(",", $values)."\r\n";
	}
?>	