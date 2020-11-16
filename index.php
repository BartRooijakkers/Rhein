<?php
session_start();
if (!isset($_SESSION['userID'])) {
    switch (@$_GET['status']) {
        case 1:
            echo "<span'>u bent uitgelogd.</span>";
            break;
        case 2:
            echo "<span style='color:red;'>Onjuist gebruikersnaam en/of wachtwoord.</span>";
            break;
        default:
            echo "<span style='color:red;'>U bent niet ingelogd.</span>";
            break;
    }
} else {
    header('Location:home.php');
}
?>

<html>

<head>
    <link rel="stylesheet" href="css/stylesheet.css" type="text/css">
</head>

<body>
    <div class="contentBox" style="height:30%;">
    </div>
    <div class="contentBox">
        <div class="contentTile20"></div>
        <div class="contentTile20"></div>
        <div class="contentTile20">
            <div class="login">
                <form action="user.php?action=login" method="POST">
                    <label>Gebruikersnaam: </label>
                    <input type="text" name="username" placeholder="Vul uw gebruikersnaam in"></input>
                    <label>Wachtwoord: </label>
                    <input type="password" name="password" placeholder="Vul uw wachtwoord in"></input>
                    <button>Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>