<!DOCTYPE html>
<?php include 'include/dbcon.php';
    session_start();?>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title>Blogpagina</title>
</head>
<body>
    <?php include 'include/header.php';
    include 'include/slider.php'?>
</body>
</html>

<center>
<?php
// COUNT
$sql = "SELECT COUNT(*) FROM posts";
$result = mysqli_query($dbcon, $sql);
$r = mysqli_fetch_row($result);
$numrows = $r[0];

$rowsperpage = 5;
$totalpages = ceil($numrows / $rowsperpage);

if(isset($_GET['page']) && is_numeric($_GET['page'])) {
$page = (INT) $_GET['page'];
}

$page = '';

if($page < 1) {
	$page = 1;
	}
	$offset = ($page - 1) * $rowsperpage;

$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $offset, $rowsperpage";
$result = mysqli_query($dbcon, $sql);

if(mysqli_num_rows($result) < 1) {
echo '<div class="niks">Nothing to display</div>';
}
while ($row = mysqli_fetch_assoc($result)) {

$id = htmlentities($row['id']);
$image = htmlentities($row['foto']);
$foto = htmlentities($row['foto']);
$title = htmlentities($row['title']);
$des = htmlentities($row['description']);
$time = htmlentities($row['date']);


echo '<div class="previewblok">';
echo "<h3><a href='view.php?id=$id'>$title</a></h3><p>";

echo substr($des, 0,100);

echo '</div> <div class="tijd">';
echo "$time</div>";
echo '</div>';
}


if($page > 1){
	echo "<a href='?page=1'>&laquo;</a>";
	$prevpage = $page - 1;
	echo "<a href='?page=$prevpage' class=''><</a>";
	}
	$range = 5;
	for ($x = $page - $range;$x < ($page + $range) + 1; $x++) {
		if(($x > 0) &&  ($x <= $totalpages)) {
if($x == $page) {
}
	else {
		echo "<a href='?page=$x' class='knopje'>$x</a>";
}
}
}

 if($page != $totalpages) {
 	$nextpage  = $page + 1;
 echo "<a href='?page=$nextpage' class=''>></a>";
	echo "<a href='?page=$totalpages' class='w3-btn'>&raquo;</a>";
	}
	echo "</div>";

    include 'include/footer.php'

?>
</center>
