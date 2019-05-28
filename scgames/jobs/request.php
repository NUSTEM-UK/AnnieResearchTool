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
	$stmt -> execute([':id' => $id, ':liked' => $liked,  ':unknown' => $unknown, ':disliked' => $disliked, ':unsure' => $uncertain]);

	echo $id;
	echo "\n";
	echo $unknown;
	echo "\n";
	echo $liked;
	echo "\n";
	echo $disliked;
	echo "\n";
	echo $uncertain;
	echo "\n";
	echo $stmt->errorCode();
	echo "\n";
	print_r ($stmt->errorInfo());
}
?>