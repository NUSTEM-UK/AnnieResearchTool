<?php
    // Connect to BD
    include('../src/connect.php');

    $ids = array();
	$careers = array();
	$data = array();

	$conn = connect();

	$careers_request = 'SELECT * FROM careers_list;';
    foreach ($conn -> query($careers_request) as $row) {
    	if (trim($row['id']) != '') {
			array_push($ids,$row['id']);
		}
    }

    foreach ($conn -> query($careers_request) as $row) {
        if (trim($row['careers']) != '') {
            array_push($careers,$row['careers']);
        }
    }
    // Selects all data in DB
    $sql = "SELECT * FROM careers ORDER BY 'timestamp';";
    foreach($conn -> query($sql) as $row) {
      	$data[$row['id']] = array();

        $data[$row['id']]['id'] = $row['id'];
        
    	foreach ($ids as $career) {
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

        $data[$row['id']]['timestamp'] = $row['timestamp'];
        $data[$row['id']]['gender'] = $row['gender'];
        $data[$row['id']]['yeargroup'] = $row['yeargroup'];
        $data[$row['id']]['likesci'] = $row['likesci'];
        $data[$row['id']]['goodsci'] = $row['goodsci'];
    }
    
    // Return data in CSV format to download
    echo "id,".implode(",", $careers).",timestamp,"."gender,"."yeargroup,"."likesci,"."goodsci"."\r\n";

    foreach ($data as $fields) {
        echo implode(",", $fields)."\r\n";
    }
?>