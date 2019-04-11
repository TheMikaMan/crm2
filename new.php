<?php
session_start();
if(!isset($_SESSION['username'])) {
	header("location: login.php");
	exit();
	}
include("include/dbcon.php");
$id = (INT) $_GET['id'];

include 'include/headeradmin.php';

if(isset($_POST['submit'])) {
$id = $_POST['id'];
$title = mysqli_real_escape_string($dbcon, $_POST['title']);
$description = mysqli_real_escape_string($dbcon, $_POST ['description']);
$date = date('Y-m-d H:i');
$posted_by = mysqli_real_escape_string($dbcon, $_SESSION['username']);

$sql = "INSERT INTO posts (id, title, description, posted_by, date) VALUES('$id', '$title', '$description', '$posted_by', '$date')";
mysqli_query($dbcon, $sql) or die("failed to post". mysqli_connect_error());

  printf("Posted successfully. <meta http-equiv='refresh' content='2; url=view.php?id=%d'/>", mysqli_insert_id($dbcon));


	}
else {
	?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title>Admin</title>
</head>
    <body>
        <form id="nieuwbericht" action="" method="POST">
        <label>Titel</label>

        <input type="text" class="titlebalk" name="title" required/>
        <br>

        <label>Bericht</label>
        <input id="textblok" row="30" cols="50" class="berichtbalk" name="description" required/>
        <br>

        <label>Uitgelichte foto</label>
        <input type="file" name="foto" />

        <input type="submit" class="postknop" name="submit" value="Publiceren"/>
        </form>
    </body>
</html>


