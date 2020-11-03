<?php
if (@include 'functions.php') {
    if ($_SESSION['afdeling'] != 12) {
        echo "<script> alert('U beschikt niet over admin rechten');</script>";
        header('Location:home.php');
    }
} else {
    echo "error";
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
            <?php
            echo "<p style='text-align:center;'>Welkom <b>" . $_SESSION['naam'] . " " . $_SESSION['achternaam'] . "</b>!"
            ?>
            <br><a href="user.php?action=logout">Uitloggen</a>
        </div>
        <div class="contentTile">
            <h1 class="pageTitle">Gebruiker Toevoegen</h1>
        </div>
    </div>
    <div class="contentBox">
        <div class="contentTile">
            <?php include("navigatie.php"); ?>
        </div>
    </div>
    <div class="contentBox">
        <div class="contentTile">
            <form class="addUser" action="" method="POST">
                <label for="username">Gebruikersnaam*:</label>
                <input type="text" name="username"></input>
                <label for="username">Voornaam*:</label>
                <input type="text" name="voornaam"></input>
                <label for="username">Tussenvoegsel:</label>
                <input type="text" name="tussenvoegsel"></input>
                <label for="username">Achternaam*:</label>
                <input type="text" name="achternaam"></input>

                <button>Toevoegen</button>
            </form>
        </div>
    </div>
    <div class="contentBox"></div>
</body>

</html>