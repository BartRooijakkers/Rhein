<?php
session_start();
if(!isset($_SESSION['userID'])){
switch (@$_GET['status']) {
    case 1:
        echo "u bent uitgelogd.";
        break;
    case 2:
        echo "Onjuist gebruikersnaam en/of wachtwoord.";
        break;
    default:
        echo "U bent niet ingelogd.";
        break;
}
}else{
    header('Location:home.php'); 
}
?>

<html>
<head>
<link rel="stylesheet" href="css/stylesheet.css" type="text/css">
</head>
<body>
<div class="login">
<form action="user.php?action=login" method="POST">
<label>Gebruikersnaam: </label>
<input type="text" name="username" placeholder="Vul uw gebruikersnaam in"></input>
<label>Wachtwoord: </label>
<input type="password" name="password" placeholder="Vul uw wachtwoord in"></input>
<button>Login</button>
</form>
</div>
</body>
</html>