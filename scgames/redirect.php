<?php
	session_start();

	// Grab data for session from form
	$fname = ($_POST['fname'] ?: NULL);
	$lname = ($_POST['lname'] ?: NULL);
	$bday = ($_POST['bday'] ?: 00);
	$bmonth = ($_POST['bmonth'] ?: 00);
	$school = ($_POST['school'] ?: ZZ);

	// Ass personal data to session for later use
	$_SESSION["fname"]=strtolower($fname);
	$_SESSION["lname"]=strtolower($lname);
	$_SESSION["bday"]=$bday;
	$_SESSION["bmonth"]=(int)$bmonth;
	$_SESSION["school"]=(Int)$school;

	// Link to jobs tool
	header("Location: https://nustem.uk/r/scgames/jobs/");
?>