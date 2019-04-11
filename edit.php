<?php
session_start();
if(!isset($_SESSION['username'])) {
	header("location: login.php");
	}
include("include/adminheader.php");
include("include/dbcon.php");

$id = (INT) $_GET['id'];
if($id < 1) {
	header("location: index.php");
}

$sql = "SELECT * FROM posts WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);
if(mysqli_num_rows($result) ==0) {
	header("location: index.php");
	}
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$title = $row['title'];
$description = $row['description'];

if(isset($_POST['upd'])) {
 $id = $_POST['id'];
 $title = mysqli_real_escape_string($dbcon, $_POST['title']);
 $description = mysqli_real_escape_string($dbcon, $_POST['description']);

	$sql2 = "UPDATE posts SET title = '$title', description = '$description' WHERE id = $id";

if(mysqli_query($dbcon, $sql2)) {
// or die("failed to edit. ". mysqli_connect_error());
	echo "Post edited successfully.";
	echo "<meta http-equiv='refresh' content='2; url=view.php?id=$id' />";

	}
	else {
		echo "failed to edit.". mysqli_connect_error();
		}
		}
?>

<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title>Admin</title>
</head>
<body>
    <?php include 'include/adminheader.php';?>
    <div id="midblock">
    <form action="" method="POST" id="editpost" class="nieuwbericht">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <label>Titel</label>
    <input type="text" class="w3-input w3-border" name="title" value="<?php echo $title;?>">

    <label>Bewerk bericht</label>
    <br>
    <textarea class="w3-input w3-border" name="description" row="4" cols="50"><?php echo $description;?> </textarea>

    <input type="submit" class="postknop" name="upd" value="Aanpassen">
    </form>
    </div>
</body>
</html>


<?php

mysqli_close($dbcon);
//include("include/footer.php");
?>
