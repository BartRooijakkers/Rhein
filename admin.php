<?php
if (@include 'functions.php') {
    if ($_SESSION['afdeling'] != 12) {
        echo "<script> alert('U beschikt niet over admin rechten');</script>";
        header('Location:home.php');
    }
} else {
    echo "error";
}
switch (@$_GET['request_status']) {
    case 1:
        $sql = "UPDATE gebruikers SET account_status = 1 WHERE gebruiker_ID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id'=> $_GET['id']]);
        echo "<script>alert('Gebruiker Geaccepteerd!');</script>";
        break;
    case 2:
        $sql = "DELETE FROM gebruikers WHERE gebruiker_ID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $_GET['id']]);
        echo "<script>alert('Gebruiker verwijderd');</script>";
        break;
    default:
        # code...
        break;
}
//Retrieve all active users from DB
$sql_active = $conn->query("SELECT gebruikers.voor_naam,gebruikers.achter_naam,gebruikers.tussenvoegsel,gebruikers.username,afdelingen.afdeling_naam, 
COUNT(voorbladen.opdracht_nummer)'aantal_keuringen', DATE_FORMAT(gebruikers.last_login,'%d-%m-%y%y  %H:%i') 'login_time' FROM gebruikers INNER JOIN afdelingen ON gebruikers.afdeling = afdelingen.afdeling_ID 
LEFT JOIN voorbladen ON voorbladen.uitvoerder = gebruikers.gebruiker_ID WHERE gebruikers.account_status = 1 GROUP BY gebruikers.gebruiker_ID ORDER BY achter_naam ASC");
// Retrieve all user requests from DB
$sql_requests = $conn->query("SELECT gebruikers.voor_naam,gebruikers.achter_naam,gebruikers.tussenvoegsel,gebruikers.username,gebruikers.gebruiker_ID,afdelingen.afdeling_naam FROM gebruikers 
INNER JOIN afdelingen ON gebruikers.afdeling = afdelingen.afdeling_ID WHERE gebruikers.account_status = 0 GROUP BY gebruikers.gebruiker_ID ORDER BY achter_naam ASC")
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
            <h1 class="pageTitle">Admin pagina</h1>
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
                    <th>Laatst ingelogd:</th>
                </tr>
                <?php
                while ($row = $sql_active->fetch()) {
                    if($row->login_time ==null){
                        $row->login_time = "Nooit";
                    }
                    echo "<tr><td>{$row->voor_naam}</td><td>{$row->tussenvoegsel}</td><td>{$row->achter_naam}</td><td>{$row->username}</td><td>{$row->afdeling_naam}</td><td>{$row->aantal_keuringen}</td><td>{$row->login_time}</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
    <div class="contentBox">
        <div class="contentTile"></div>
        <div class="contentTileAuto">
            <?php   if($sql_requests->rowCount()> 0){
                    echo "<table class='requests'>
                <caption>
                    <h3>Account verzoeken</h3>
                </caption>
                <tr>
                    <th>Voornaam</th>
                    <th>tussenvoegsel</th>
                    <th>Achternaam</th>
                    <th>Gebruikersnaam</th>
                    <th>Afdeling</th>
                    <th>Goedkeuring</th>
                </tr>";
                while ($row = $sql_requests->fetch()) {
                    echo "<tr><td>{$row->voor_naam}</td><td>{$row->tussenvoegsel}</td><td>{$row->achter_naam}</td><td>{$row->username}</td><td>{$row->afdeling_naam}</td>
                    <td><a class='button green' href='admin.php?request_status=1&id={$row->gebruiker_ID}'>Accept</a> <a class='button red' href='admin.php?request_status=2&id={$row->gebruiker_ID}'>Deny</a></td></tr>";
                }
            }else{
                echo "<br><h3>Geen account verzoeken op dit moment</h3>";
            }
                    
                ?>
                </table>
        </div>
    </div>
</body>

</html>