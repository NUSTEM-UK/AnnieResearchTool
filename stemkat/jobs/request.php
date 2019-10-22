<?php
if(isset($_REQUEST))
{
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	// Import from AJAX post
	$id = ($_POST['id'] ?: NULL);
	$unknown = ($_POST['unknowncards'] ?: NULL);
	$liked = ($_POST['likedcards'] ?: NULL);
	$disliked = ($_POST['dislikedcards'] ?: NULL);
	$uncertain = ($_POST['uncertain'] ?: NULL);	

	// Connect to BD
	include('../src/connect.php');

	$conn = connect();

	$stmt = $conn -> prepare("INSERT INTO careers(id, unknown, liked, disliked, unsure) VALUES(:id, :unknown, :liked, :disliked, :unsure);");
	$stmt -> execute([':id' => $id, ':liked' => $liked,  ':unknown' => $unknown, ':disliked' => $disliked, ':unsure' => $uncertain]);
	// $stmt -> debugDumpParams(); // Spew raw SQL into the popup dialog so we can see what's going on (comment out for production)
	$errorCode = $stmt->errorInfo();

	// Returns error code top be sent as alert if not expected
	echo $errorCode[0];
}
?>