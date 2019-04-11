<?php
session_start();
 include("include/adminheader.php");
include("include/dbcon.php");
$id = (INT) $_GET['id'];
 if($id < 1) {
     header("location: index.php");
 }
$sql = "Select * FROM posts WHERE id = '$id'";
 $result = mysqli_query($dbcon, $sql);

  $invalid = mysqli_num_rows($result);
  if($invalid == 0) {
header("location: index.php");
  }

 $hsql = "UPDATE posts SET hits = hits +1 WHERE id = '$id'";
  mysqli_query($dbcon, $hsql);

  $hsql = "SELECT * FROM posts WHERE id = '$id'";
  $res = mysqli_query($dbcon, $hsql);
  $hits =mysqli_fetch_row($res);

 $row = mysqli_fetch_assoc($result);

$id = $row['id'];
$title = $row['title'];
$des = $row['description'];
$by = $row['posted_by'];
$hits = $row['hits'];
$time = $row['date'];

echo "<div class='bericht'>
        <div class='titlebericht'><h2>$title</h2></div>
        <div class='mainbericht'><p>$des</p></div>
        <div class='auteur'><p>Auteur: ". $by."</p></div>
        <div class='viewsbericht'><p>Views: ". $hits[0]."</p></div>
        <div class='tijdbericht'>$time</div>
    </div>"
?>



<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title>Blog</title>
</head>
<body>
    <?php include 'include/header.php'?>

    <?php
    if(isset($_SESSION['username'])) {
	?>

        <div class="editdelete">
            <button class="postknop1" href="edit.php?id=<?php echo $row['id'];?>">Aanpassen</button>
            <button class="postknop1" href="del.php?id=<?php echo $row['id'];?>" onclick="return confirm('Weet je zeker dat je de post wilt verwijderen?'); ">Delete</button>
        </div>

</body>
</html>
<?php
}


//include("include/footer.php"); ?>
