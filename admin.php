<?php
session_start();
if(!isset($_SESSION['username'])) {
	header("location: login.php");
	exit();
	}
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
    <?php include 'include/adminheader.php'?>
</body>
</html>

<?php
session_start();
include("include/dbcon.php");
		include("include/adminheader.php");
if(!isset($_SESSION['username'])) {
	header("location: login.php");
	exit();
	}

?>
<h2 class="w3-container w3-teal w3-center">Admin Dashboard</h2>
<div class="w3-container">
<p>Welcome <?php echo $_SESSION['username']; ?></p>

<h5 class="w3-center">Posts</h5>

<?php
$sql = "SELECT COUNT(*) FROM klant";
$result = mysqli_query($dbcon, $sql);
$r = mysqli_fetch_row($result);
$numrows = $r[0];
$rowsperpage = 5;
$page = ['page'];
$totalpages = ceil($numrows / $rowsperpage);
if(isset($_GET['page']) && is_numeric($_GET['page'])) {
	$page = (INT) $_GET['page'];
	}
	if($page > $totalpages) {
		$page = $totalpages;
		}
		if($page < 1) {
			$page = 1;
			}
			$offset = ($page - 1) * $rowsperpage;

$sql = "SELECT * FROM klant ORDER BY id DESC LIMIT $offset, $rowsperpage";
$result = mysqli_query($dbcon, $sql);

if(mysqli_num_rows($result) < 1) {
    echo "No post found";
	}

echo "<th>Klant id</th>";
echo "<th></th>";
echo "<th>Date</th>";
echo "<th>Views</th>";
echo "<th>Action</th>";
echo "</tr>";
	while ($row = mysqli_fetch_assoc($result)) {
		$id = $row['id'];
        $naam = $row['naam'];
        $tvoeg = $row['tvoeg'];
        $achtnaam = $row ['achtnaam'];
        $gesla = $row ['gesla'];
        $telnum = $row ['telnum'];
        $email = $row ['email'];
        $straat = $row ['straat'];
        $huisnum = $row ['huisnum'];
        $post = $row ['post'];
        $woon = $row ['woon'];
        $land = $row ['land'];
        $date = $row ['aanmaakdatum'];
        $id = $_POST['id'];
      ?>

<tr>
	<td><?php echo $id;?></td>
<td><a href="view.php?id=<?php echo $id;?>"><?php echo substr($title) ;?></a></td>
<td><?php echo $time;?></td>
<td><?php echo $hits;?></td>
<td><a href="edit.php?id=<?php echo $id;?>">Edit</a> | <a href="del.php?id=<?php echo $id;?>" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a></td>
</tr>

<?php
}
echo "</table>";
// pagination
echo "<div class='w3-bar w3-center'>";
if($page > 1) {
	echo "<a href='?page=1' class='w3-btn'><<</a>";
	$prevpage = $page - 1;
	echo "<a href='?page=$prevpage' class='w3-btn'><</a>";
	}
$range = 3;
for($i = ($page - $range);$i < ($page + $range) + 1;$i++) {
	if(($i > 0) && ($i <= $totalpages)) {
		if($i == $page) {
			echo "<div class='w3-btn w3-teal w3-hover-green'> $i</div>";
			}
			else {
				echo "<a href='?page=$i' class='w3-btn w3-border'>$i</a>";
				}
				}
	}
	if($page != $totalpages) {
		$nextpage = $page + 1;
echo "<a href='?page=$nextpage' class='w3-btn'>></a>";
		echo "<a href='?page=$totalpages' class='w3-btn'>>></a>";
}
echo "</div>";

include("include/footer.php");
?>
