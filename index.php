<?php
session_start();
//Include("header.php");
include 'include/dbcon.php';

	if(isset($_POST['log'])) {
		$username = mysqli_real_escape_string($dbcon, $_POST['username']);
		$password = mysqli_real_escape_string($dbcon, md5($_POST['password']));
		$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($dbcon, $sql);
		$rows = mysqli_num_rows($result);
		if($rows == 1) {
			$_SESSION['username'] = $username;
			header("location: admin.php");
			}
			else {
                echo "incorrect details";
			}
            }  else {
		?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div id="bloklog">
        <div id="topbar"><center><h2 id="logte">Inloggen</h2></center></div>
            <center>
                <form action ="" method ="POST" id="loginform">
                    <input class="inputlog" type="text" name="username" placeholder="Gebruikersnaam">
                    <input class="inputlog" type="password" name ="password" placeholder="Wachtwoord">
                    <input id="submit" type ="submit" name ="log" value="Login">
                </form>
                <div id="aanmelden">
                    <a href="klantaanmaken.php">Nog geen klant<br/>Meld u dan hier aan.</a>
                </div>
            </center>
    </div>
</body>
</html>
<?php
}
//include 'include/footer.php';
?>
