<?php  if(isset($_SESSION['username'])) {
echo "<div id='header1'>
    <nav>
        <ul>
            <li><a href='index.php'>Home</a></li>
            <li><a href='admin.php'>Dashboard</a></li>
            <li><a href='logout.php'>Uitloggen</a></li>
        </ul>
    </nav>
</div>";
}else{

echo "<div id='header1'>
        <nav>
            <ul>
                <li><a href='index.php'>Home</a></li>
                <li><a href='about.php'>Over ons</a></li>
                <li><a href='login.php'>Login</a></li>
            </ul>
        </nav>
    </div>";
}?>









