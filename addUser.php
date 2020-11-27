<?php
switch (@$_GET['userAdded']) {
    case 1:
        echo "<script>alert('Account aangevraagd! Uw aanvraag wordt in behandeling genomen.')</script>";
        break;
    case 2:
        echo "<script>alert('Helaas! deze gebruikersnaam is in gebruik.')</script>";
        break;
    
    default:
        //Niks
        break;
}
?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">

</head>

<body>
    <div class="contentBox">
        <div class="contentTile">
            <div id="logo"></div>
        </div>
        <div class="contentTile">

        </div>
        <div class="contentTile">
            <h1 class="pageTitle">Account aanvragen</h1>
        </div>
    </div>
    <div class="contentBox">
        <div class="contentTile">
            <div id="nav">
                <a class="route" href="index.php">Terug</a>
            </div>
        </div>
    </div>
    <div class="contentBox">
        <div class="contentTile20">
        </div>
        <div class="contentTile20"></div>
        <div class="contentTile20">
            <form class="addUser" action="user.php?action=addUser" method="POST">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" name="username" required> </input>
                <label for="password">Wachtwoord:</label>
                <input type="password" name="password" required></input>
                <label for="firstname">Voornaam:</label>
                <input type="text" name="firstname" required> </input>
                <label for="middlename">Tussenvoegsel:</label>
                <input type="text" name="middlename"> </input>
                <label for="lastname">Achternaam: </label>
                <input type="text" name="lastname" required> </input>
                <label for="division">Afdeling:</label>
                <select name="division" id="" required>
                    <option selected disabled hidden>Kies een afdeling</option>
                    <option value="1">Veiligheid en milieu</option>
                    <option value="2">Materieel</option>
                    <option value="3">Projectbureau</option>
                    <option value="4">Engineering</option>
                    <option value="5">Verkoop</option>
                    <option value="12">ICT</option>
                </select>

                <button>Toevoegen</button>
            </form>
        </div>
    </div>
    <div class="contentBox"></div>
</body>

</html>