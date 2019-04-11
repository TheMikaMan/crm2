<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title>Login</title>
</head>
    <body>
		<div class="register">
			<h1>Registreren</h1>
			<form action="" method="post" autocomplete="off">

				<label for="Voornaam">
				</label>
				<input type="text" name="naam" placeholder="Voornaam" id="naam" required>

               <label for="Tussenvoegsel">
				</label>
                <input type="text" name="tvoeg" placeholder="Tussenvoegsel" id="tvoeg" >

                <label for="Achternaam">
				</label>
				<input type="text" name="achtnaam" placeholder="Achternaam" id="achtnaam" required>

                <label for="Telefoonnummer">
				</label>
				<input type="text" name="telnum" placeholder="Telefoonnummer" id="telnum" required>

                <label for="Geslacht">
				</label>
				<input type="text" name="gesla" placeholder="Geslacht" id="gesla" required>

                <label for="E-mail">
				</label>
				<input type="email" name="email" placeholder="E-mail adres" id="email" required>

            <div id="register2">
                <label for="Straatnaam">
				</label>
				<input type="text" name="straat" placeholder="Straatnaam" id="straat" required>

                <label for="Huisnummer">
				</label>
				<input type="text" name="huisnum" placeholder="Huisnummer" id="huisnum" required>

                <label for="Postcode">
				</label>
				<input type="text" name="post" placeholder="Postcode" id="post" required>

                <label for="Woonplaats">
				</label>
				<input type="text" name="woon" placeholder="Woonplaats" id="woon" required>

                <label for="Land">
				</label>
				<input type="text" name="land" placeholder="Land" id="Land" required>

				<input type="submit" name="submit" value="Registreren" class="postknop">
            </div>
			</form>
		</div>
	</body>
</html>

<?php
include("include/header.php");
include("include/dbcon.php");

if(isset($_POST['submit'])) {
$id = $_POST['id'];
$naam = mysqli_real_escape_string($dbcon, $_POST['naam']);
$tvoeg = mysqli_real_escape_string($dbcon, $_POST ['tvoeg']);
$achtnaam = mysqli_real_escape_string($dbcon, $_POST ['achtnaam']);
$gesla = mysqli_real_escape_string($dbcon, $_POST ['gesla']);
$telnum = mysqli_real_escape_string($dbcon, $_POST ['telnum']);
$email = mysqli_real_escape_string($dbcon, $_POST ['email']);
$straat = mysqli_real_escape_string($dbcon, $_POST ['straat']);
$huisnum = mysqli_real_escape_string($dbcon, $_POST ['huisnum']);
$post = mysqli_real_escape_string($dbcon, $_POST ['post']);
$woon = mysqli_real_escape_string($dbcon, $_POST ['woon']);
$land = mysqli_real_escape_string($dbcon, $_POST ['land']);
$date = date('Y-m-d H:i');


$sql = "INSERT INTO klant (klant_id, voornaam, tussenvoegsel, achternaam, geslacht, tel.nummer, e-mail, straatnaam, huisnummer, postcode, woonplaats, land, aanmaakdatum) VALUES('$id', '$naam', '$tvoeg', '$achtnaam', '$gesla', '$telnum', '$email', '$straat', '$huisnum', '$post', '$woon', '$land', '$date')";
mysqli_query($dbcon, $sql) or die("failed to post". mysqli_connect_error());

  //printf("Succes. <meta http-equiv='refresh' content='2; url=view.php?id=%d'/>", mysqli_insert_id($dbcon));


	}

	?>
