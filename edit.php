<?php
session_start();
if(!isset($_SESSION["username"])) {
	header("location: login.php");
	}
include("include/adminheader.php");
include("include/dbcon.php");

$id = (INT) $_GET["id"];
if($id < 1) {
	header("location: index.php");
}

$sql = "SELECT * FROM klant WHERE id = "$id"";
$result = mysqli_query($dbcon, $sql);
if(mysqli_num_rows($result) ==0) {
	header("location: index.php");
	}
$row = mysqli_fetch_assoc($result);
$id = $row["id"];
$title = $row["title"];
$description = $row["description"];

if(isset($_POST["upd"])) {
 $id = $_POST["id"];
 $title = mysqli_real_escape_string($dbcon, $_POST["title"]);
 $description = mysqli_real_escape_string($dbcon, $_POST["description"]);

	$sql2 = "UPDATE posts SET title = "$title", description = "$description" WHERE id = $id";

if(mysqli_query($dbcon, $sql2)) {
or die("failed to edit. ". mysqli_connect_error());
	echo "Post edited successfully.";
	echo "<meta http-equiv="refresh" content="2; url=view.php?id=$id" />";

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
    <?php include "include/adminheader.php";?>
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
    echo "<div id='edit'>
			<form action="" method='post' autocomplete='off'>

                <input type='hidden' name='id' value="$id">
				<label for='Voornaam'>
				</label>
				<input type='text' name='naam' placeholder='Voornaam' id='naam' value='$naam' required>

                <label for='Tussenvoegsel'>
				</label>
                <input type='text' name='tvoeg' placeholder='Tussenvoegsel' id='tvoeg' value='$tvoeg' >

                <label for='Achternaam'>
				</label>
				<input type='text' name='achtnaam' placeholder='Achternaam' id='achtnaam' value='$achtnaam' required>

                <label for='Telefoonnummer'>
				</label>
				<input type='text' name='telnum' placeholder='Telefoonnummer' id='telnum' value='$telnum' required>

                <label for='Geslacht'>
				</label>
				<input type='text' name='gesla' placeholder='Geslacht' id='gesla' value='$gesla' required>

                <label for='E-mail'>
				</label>
				<input type='email' name='telnum' placeholder='E-mail adres' id='email' value='$email' required>

            <div id='edit2'>
                <label for='Straatnaam'>
				</label>
				<input type='text' name='straat' placeholder='Straatnaam' id='straat' value='$straat' required>

                <label for='Huisnummer'>
				</label>
				<input type='text' name='huisnum' placeholder='Huisnummer' id='huisnum' value="$huisnum" required>

                <label for='Postcode'>
				</label'
				<input type='text' name='post' placeholder='Postcode' id='post' value="$post" required>

                <label for='Woonplaats'>
				</label>
				<input type='text' name='woon' placeholder='Woonplaats' id='woon' value="$woon" required>

                <label for='Land'>
				</label>
				<input type='text' name='land' placeholder='Land' id='Land' value='$land' required>

				<input type='submit' value='Aanpassen' class='postknop'>
            </div>
			</form>
		</div>";



mysqli_close($dbcon);
//include("include/footer.php");
?>
