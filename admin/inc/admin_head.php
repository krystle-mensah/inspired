<?php session_start(); ?>
<?php include "./function.php"; ?>
<?php include "../inc/db.php"; ?>

<!-- outwould buffering -->
<?php ob_start(); ?>

<?php

// this prevents user from going to admin
// 158. Logout Page Improved Validation

// if( !isset($_SESSION['user_role'] )) {
	
// 	header("Location: ../index.php");
	
// }

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		
		<meta name="description" content="" />
		
		<meta name="author" content="" />
		
		<title>Dashboard - SB Admin</title>
		
		<link href="css/styles.css" rel="stylesheet" />
		
		<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
	</head>