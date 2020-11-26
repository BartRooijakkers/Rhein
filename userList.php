<?php
if (@include 'functions.php') {
    if ($_SESSION['afdeling'] != 12) {
        echo "<script> alert('U beschikt niet over admin rechten');</script>";
        header('Location:home.php');
    }
} else {
    echo "error";
}
$sql = $conn->query("SELECT gebruikers.voor_naam,gebruikers.achter_naam,gebruikers.tussenvoegsel,gebruikers.username,afdelingen.afdeling_naam, 
COUNT(voorbladen.opdracht_nummer)'aantal_keuringen' FROM gebruikers INNER JOIN afdelingen ON gebruikers.afdeling = afdelingen.afdeling_ID 
LEFT JOIN voorbladen ON voorbladen.uitvoerder = gebruikers.gebruiker_ID WHERE gebruikers.account_status = 1 GROUP BY gebruikers.gebruiker_ID ORDER BY achter_naam DESC");
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
            <br><a href="user.php?action=logout">Uitloggen</a></p>
        </div>
        <div class="contentTile">
            <h1 class="pageTitle">Gebruikerslijst</h1>
        </div>
    </div>
    <div class="contentBox">
        <div class="contentTile">
            <?php include("include/navigatie.php"); ?>
        </div>
    </div>
    <div class="contentBox">
        <div class="contentTile"></div>
        <div class="contentTileAuto">
            <table>
                <caption>
                    <h3>Actieve gebruikers</h3>
                </caption>
                <tr>
                    <th>Voornaam</th>
                    <th>tussenvoegsel</th>
                    <th>Achternaam</th>
                    <th>Gebruikersnaam</th>
                    <th>Afdeling</th>
                    <th>Keuringen:</th>
                </tr>
                <?php
                while ($row = $sql->fetch()) {
                    echo "<tr><td>{$row->voor_naam}</td><td>{$row->tussenvoegsel}</td><td>{$row->achter_naam}</td><td>{$row->username}</td><td>{$row->afdeling_naam}</td><td>{$row->aantal_keuringen}</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>