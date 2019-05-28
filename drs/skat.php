<?php
	include('connect.php');

	$careers = array();
	$data = array();

	$conn = connect();

	$careers_request = 'SELECT * FROM careers_list;';
    foreach ($conn -> query($careers_request) as $row) {
    	if (trim($row['id']) != '') {
			array_push($careers,$row['id']);
		}
    }

    $sql = 'SELECT id, unknown, liked, disliked, unsure FROM careers;';
    foreach($conn -> query($sql) as $row) {
      	$data[$row['id']] = array();

        $data[$row['id']]['id'] = $row['id'];
        
    	foreach ($careers as $career) {
           $data[$row['id']][$career] = 0;
    	}

    	foreach (explode(",", $row['unknown']) as $career) {
           $data[$row['id']][$career] = 9;
    	}

    	foreach (explode(",", $row['liked']) as $career) {
    	   $data[$row['id']][$career] = 1;
    	}

    	foreach (explode(",", $row['disliked']) as $career) {
           $data[$row['id']][$career] = 2;
    	}

    	foreach (explode(",", $row['unsure']) as $career) {
           $data[$row['id']][$career] = 3;
    	}
    }
    
    echo "id,".implode(",", $careers)."\r\n";

    foreach ($data as $fields) {
        echo implode(",", $fields)."\r\n";
    }
?>