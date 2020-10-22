<?php
if($_GET['status'] = 1){
    echo "Gebruikersnaam / wachtwoord onjuist ";
}

?>

<html>
<head>
<link rel="stylesheet" href="css/stylesheet.css" type="text/css">
</head>
<body>
<div class="login">
<form action="login.php" method="POST">
<label>Gebruikersnaam: </label>
<input type="text" name="username" placeholder="Vul uw gebruikersnaam in"></input>
<label>Wachtwoord: </label>
<input type="password" name="password" placeholder="Vul uw wachtwoord in"></input>
<button>Login</button>
</form>
</div>
</body>
</html>