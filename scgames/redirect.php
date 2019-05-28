<?php
	session_start();

	$fname = ($_POST['fname'] ?: NULL);
	$lname = ($_POST['lname'] ?: NULL);
	$bday = ($_POST['bday'] ?: 00);
	$bmonth = ($_POST['bmonth'] ?: 00);
	$school = ($_POST['school'] ?: ZZ);

	$_SESSION["fname"]=strtolower($fname);
	$_SESSION["lname"]=strtolower($lname);
	$_SESSION["bday"]=$bday;
	$_SESSION["bmonth"]=(int)$bmonth;
	$_SESSION["school"]=(Int)$school;

	header("Location: https://nustem.uk/r/scgames/jobs/")
?>