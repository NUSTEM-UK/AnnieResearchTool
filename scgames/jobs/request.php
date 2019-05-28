<?php
if(isset($_REQUEST))
{
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$id = ($_POST['id'] ?: NULL);
	$unknown = ($_POST['unknowncards'] ?: NULL);
	$liked = ($_POST['likedcards'] ?: NULL);
	$disliked = ($_POST['dislikedcards'] ?: NULL);
	$uncertain = ($_POST['uncertain'] ?: NULL);	

	include('../connect.php');

	$conn = connect();

	$stmt = $conn -> prepare("INSERT INTO careers(id, unknown, liked, disliked, unsure) VALUES(:id, :unknown, :liked, :disliked, :unsure);");
	$stmt -> execute([':id' => $id, ':unknown' => $unknown, ':liked' => $liked, ':disliked' => $disliked, ':unsure' => $uncertain]);

	// echo $id;
	// echo $unknown;
	// echo $liked;
	// echo $disliked;
	// echo $uncertain;
	echo $stmt->errorCode();
}
?>