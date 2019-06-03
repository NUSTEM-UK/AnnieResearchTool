<?php
if(isset($_REQUEST))
{
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	// Import from AJAX post
	$id = ($_POST['id'] ?: NULL);
	$sciId = ($_POST['sciId'] ?: NULL);
	$sciRow = ($_POST['sciRow'] ?: NULL);
	$meId = ($_POST['meId'] ?: NULL);
	$meRow = ($_POST['meRow'] ?: NULL);

	// Split string into array
	$sciId = explode("," ,$sciId);
	$sciRow = explode("," ,$sciRow);
	$meId = explode("," ,$meId);
	$meRow = explode("," ,$meRow);

	$sciNum = [];
	$meNum = [];

	foreach ($sciRow as $rowId) {
    	array_push($sciNum, (int)substr($rowId, -1));
	}

	foreach ($meRow as $rowId) {
    	array_push($meNum, (int)substr($rowId, -1));
	}

	// Connect to BD
	include('../connect.php');

	$conn = connect();

	$stmt = $conn -> prepare("INSERT INTO attrib(id, meclever, mecreative, mepatient, mebrave, mehelpful, mefun, mefriendly, mecurious, mehardworking, sciclever, scicreative, scipatient, scibrave, scihelpful, scifun, scifriendly, scicurious, scihardworking) 
	VALUES(:id, :meclever, :mecreative, :mepatient, :mebrave, :mehelpful, :mefun, :mefriendly, :mecurious, :mehardworking, :sciclever, :scicreative, :scipatient, :scibrave, :scihelpful, :scifun, :scifriendly, :scicurious, :scihardworking);");

	$stmt -> execute([':id' => $id, ':meclever' => $meNum[1], ':mecreative' => $meNum[2], ':mepatient' => $meNum[8], ':mebrave' => $meNum[0], ':mehelpful' => $meNum[7], ':mefun' => $meNum[5], ':mefriendly' => $meNum[4], ':mecurious' => $meNum[3], ':mehardworking' => $meNum[6], ':sciclever' => $sciNum[1], ':scicreative' => $sciNum[2], ':scipatient' => $sciNum[8], ':scibrave' => $sciNum[0], ':scihelpful' => $sciNum[7], ':scifun' => $sciNum[5], ':scifriendly' => $sciNum[4], ':scicurious' => $sciNum[3], ':scihardworking' => $sciNum[6]]);

	$errorCode = $stmt->errorInfo();

	// Returns error code top be sent as allert if not expected
	echo $errorCode[0];
}
?>