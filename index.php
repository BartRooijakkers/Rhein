<?php
session_start();
if (!isset($_SESSION['userID'])) {
} else {
    header('Location:home.php');
}
?>

<html>

<head>
    <link rel="stylesheet" href="css/stylesheet.css" type="text/css">
</head>

<body>
    <!-- <div class="contentBox" style="height:30%;">
    </div> -->
    <div class="contentBox" style="min-height:30%;">
        <div class="contentTile">
            <div id="logo"></div>
        </div>
        <div class="contentTile">
            <?php switch (@$_GET['status']) {
                case 1:
                    echo "<p style='text-align:center;'>u bent uitgelogd.</p>";
                    break;
                case 2:
                    echo "<p style='color:red; font-weight:bold; text-align:center;'>Onjuist gebruikersnaam en/of wachtwoord.</p>";
                    break;
                default:
                    echo "<p style='color:red; font-weight:bold; text-align:center;'>U bent niet ingelogd.</p>";
                    break;
            }
            ?>
        </div>
        <div class="contentTile">
            <h1 class="pageTitle">Inlogscherm</h1>
        </div>
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