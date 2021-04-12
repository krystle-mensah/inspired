<?php

session_start();

include "db.php";

// outwould buffering
ob_start();

?>

<?php

// how to prevent certian users from going to admin

if (!isset($_SESSION['user_role'])) {

	header("Location: ../index.php");
}

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

	<link href="css/admin_styles.css" rel="stylesheet" />

	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

	<!-- FAVICON -->
	<link rel="icon" href="/favicon.ico">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

	<script src="ckeditor/ckeditor.js"></script>

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<!-- SHARE BUTTON ALL MEDIA -->
	<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6019477b3215db0018ca6c68&product=inline-share-buttons" async="async"></script>

</head>