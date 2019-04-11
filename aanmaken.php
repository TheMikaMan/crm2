
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title>Admin</title>
</head>
    <body>
        <div id="midblock">
            <form class="nieuwbericht" action="" method="POST">
                <div id="newaan"><h1>Nieuw bericht</h1></div>
            <label>Titel</label>
            <br>
            <input type="text" id="titlebalk" class="fromtext" name="title" required/>
            <br>

            <label>Bericht</label>
            <textarea id="textblok" class="fromtext" row="4" cols="50" name="description" required></textarea>
            <br>

            <label>Uitgelichte foto</label><br>
            <input type="file" id="foto" name="foto">
            <br>
            <br>
            <input type="submit" class="postknop" name="submit" value="Publiceren"/>
            </form>
        </div>
    </body>
</html>

<?php
session_start();
if(!isset($_SESSION['username'])) {
	header("location: login.php");
	exit();
	}
include("include/adminheader.php");
include("include/dbcon.php");
$id = ['id'];

if(isset($_POST['submit'])) {
$id = $_POST['id'];
$title = mysqli_real_escape_string($dbcon, $_POST['title']);
$description = mysqli_real_escape_string($dbcon, $_POST ['description']);
$date = date('Y-m-d H:i');
$posted_by = mysqli_real_escape_string($dbcon, $_SESSION['username']);

$sql = "INSERT INTO posts (id, title, description, posted_by, date) VALUES('$id', '$title', '$description', '$posted_by', '$date')";
mysqli_query($dbcon, $sql) or die("failed to post". mysqli_connect_error());

  printf("Succes. <meta http-equiv='refresh' content='2; url=view.php?id=%d'/>", mysqli_insert_id($dbcon));


	}

	?>
