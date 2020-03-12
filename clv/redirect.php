<?php
	session_start();

	// Grab data for session from form
	$fname = ($_POST['fname'] ?: NULL);
	$lname = ($_POST['lname'] ?: NULL);
	$bday = ($_POST['bday'] ?: 00);
	$bmonth = ($_POST['bmonth'] ?: 00);
	$school = ($_POST['school'] ?: ZZ);
	// Additions for CITE
	$gender = ($_POST['gender'] ?: NULL);
	$yeargroup = ($_POST['yeargroup'] ?: NULL);
	$likesci = ($_POST['likesci'] ?: NULL);
	$goodsci = ($_POST['goodsci'] ?: NULL);

	// Ass personal data to session for later use
	$_SESSION["fname"]=strtolower($fname);
	$_SESSION["lname"]=strtolower($lname);
	$_SESSION["bday"]=$bday;
	$_SESSION["bmonth"]=(int)$bmonth;
	$_SESSION["school"]=(Int)$school;
	// Additions for CITE
	$_SESSION["gender"]=$gender;
	$_SESSION["yeargroup"]=$yeargroup;
	$_SESSION["likesci"]=$likesci;
	$_SESSION["goodsci"]=$goodsci;

	// Link to jobs tool
	header("Location: https://nustem.uk/r/clv/jobs/");
?>