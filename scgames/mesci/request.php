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

	error_log($sciRow, 0);
	error_log($sciId, 0);
	error_log($meRow, 0);
	error_log($meId, 0);

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
	// error_log(print_r($sciNum), 0);

	foreach ($meRow as $rowId) {
    	array_push($meNum, (int)substr($rowId, -1));
	}
	// error_log(print_r($meNum), 0);

	// Connect to BD
	include('../src/connect.php');

	$conn = connect();

	$stmt = $conn -> prepare("INSERT INTO attrib(id, meclever, mecreative, mesensible, mestrange, mekind, mefun, mefriendly, mecool, mehardworking, sciclever, scicreative, scisensible, scistrange, scikind, scifun, scifriendly, scicool, scihardworking) 
	VALUES(:id, :meclever, :mecreative, :mesensible, :mestrange, :mekind, :mefun, :mefriendly, :mecool, :mehardworking, :sciclever, :scicreative, :scisensible, :scistrange, :scikind, :scifun, :scifriendly, :scicool, :scihardworking);");
	
	// Array data has been ordered alphabetically before being being passed in here, so needs to be referenced as such.
	// (This was source of a huge bug, as the code otherwise assumes a fixed attribute order; this is the only place it's been sorted.
	// TODO: Replace entire data structure with key:value dictionaries, for the sake of data integrity.
	$stmt -> execute([':id' => $id, ':meclever' => $meNum[0], 
									':mecreative' => $meNum[2], 
									':mesensible' => $meNum[7], 
									':mestrange' => $meNum[8], 
									':mekind' => $meNum[6], 
									':mefun' => $meNum[4], 
									':mefriendly' => $meNum[3], 
									':mecool' => $meNum[1], 
									':mehardworking' => $meNum[5], 
									':sciclever' => $sciNum[0], 
									':scicreative' => $sciNum[2], 
									':scisensible' => $sciNum[7], 
									':scistrange' => $sciNum[8], 
									':scikind' => $sciNum[6], 
									':scifun' => $sciNum[4], 
									':scifriendly' => $sciNum[3], 
									':scicool' => $sciNum[1], 
									':scihardworking' => $sciNum[5]]);
	// $stmt -> debugDumpParams(); // Spew raw SQL into the popup dialog so we can see what's going on (comment out for production)
	
	$errorCode = $stmt->errorInfo();

	// Returns error code top be sent as allert if not expected
	echo $errorCode[0];
}
?>