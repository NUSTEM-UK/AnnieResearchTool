<?php
	// Connect to BD
	include('connect.php');

	$headers = array('id',
					 'meclever',
					 'mecreative',
					 'mesensible',
					 'mestrange',
					 'mekind',
					 'mefun',
					 'mefriendly',
					 'mecool',
					 'mehardworking',
					 'sciclever',
					 'scicreative',
					 'scisensible',
					 'scistrange',
					 'scikind',
					 'scifun',
					 'scifriendly',
					 'scicool',
					 'scihardworking',
					 'timestamp');
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
	    	$row['mesensible'],
	    	$row['mestrange'],
	    	$row['mekind'],
	    	$row['mefun'],
	    	$row['mefriendly'],
	    	$row['mecool'],
	    	$row['mehardworking'],
	    	$row['sciclever'],
	    	$row['scicreative'],
	    	$row['scisensible'],
	    	$row['scistrange'],
	    	$row['scikind'],
	    	$row['scifun'],
	    	$row['scifriendly'],
	    	$row['scicool'],
	    	$row['scihardworking'],
	    	$row['timestamp']));
    }

    // Return data in CVS format to download
	echo implode(",", $headers)."\r\n";

	foreach ($data as $values) {
		echo implode(",", $values)."\r\n";
	}
?>	