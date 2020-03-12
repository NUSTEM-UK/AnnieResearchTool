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
	// Additions for CITE
	$gender = ($_POST['gender'] ?: NULL);
	$yeargroup = ($_POST['yeargroup'] ?: NULL);
	$likesci = ($_POST['likesci'] ?: NULL);
	$goodsci = ($_POST['goodsci'] ?: NULL);

	// Connect to DB
	include('../src/connect.php');

	$conn = connect();

	$stmt = $conn -> prepare("INSERT INTO careers(id, unknown, liked, disliked, unsure, gender, yeargroup, likesci, goodsci) VALUES(:id, :unknown, :liked, :disliked, :unsure, :gender, :yeargroup, :likesci, :goodsci);");
	$stmt -> execute([':id' => $id, ':liked' => $liked,  ':unknown' => $unknown, ':disliked' => $disliked, ':unsure' => $uncertain, ':gender' => $gender, ':yeargroup' => $yeargroup, ':likesci' => $likesci, ':goodsci' => $goodsci]);
	
	// $stmt -> debugDumpParams(); // Spew raw SQL into the popup dialog so we can see what's going on (comment out for production)
	$errorCode = $stmt->errorInfo();

	// Returns error code top be sent as alert if not expected
	// $stmt->debugDumpParams(); // Spit out the query string
	echo $errorCode[0];
}
?>