<?php
if (@include 'functions.php') {
} else {
    echo "error";
}
// Overzicht alle Keuringen oproepen
$sql = $conn->query("SELECT hijstesten.*, kabelchecklisten.*, voorbladen.*, gebruikers.voor_naam, gebruikers.achter_naam, CAST(voorbladen.keurings_datum AS date) keuringsDatum FROM voorbladen LEFT JOIN hijstesten ON voorbladen.opdracht_nummer = hijstesten.opdracht_nummer
 LEFT JOIN kabelchecklisten ON voorbladen.opdracht_nummer = kabelchecklisten.opdracht_nummer INNER JOIN gebruikers on voorbladen.uitvoerder = gebruikers.gebruiker_ID ORDER BY voorbladen.keurings_datum DESC");
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
            <h1 class="pageTitle">Overzichten</h1>
        </div>
    </div>
    <div class="contentBox">
        <div class="contentTile">
            <?php include("include/navigatie.php"); ?>
        </div>
    </div>
    <div class="contentBox">
    <table>
        <tr>
            <th>Opdracht #</th>
            <th>Soort Test</th>
            <th>Referentie #</th>
            <th>Datum</th>
            <th>Uitvoerder</th>
            <th>Akkoord</th>
        </tr>
        <?php
        while ($row = $sql->fetch()) {
            switch ($row->akkoord) {
                case 1:
                    $akkoord = "<p style='color:green; font-weight:bold;'>Goedgekeurd</p>";
                    break;
                case 0:
                    $akkoord = "<p style='color:red; font-weight:bold;'>Afgewezen</p>";
                    break;
            }
            switch ($row->soort_keuring) {
                case 1:
                    $soort_keuring = "<p style='color:blue; font-weight:bold;'>Hijstest</p>";
                    break;
                case 2:
                    $soort_keuring = "<p style='color:brown; font-weight:bold;'>Kabeltest</p>";
                    break;
                default:
                    $soort_keuring = "Niet vermeld.";
                    break;
            }
            if (!isset($row->volg_nummer)) {
                $referentie_nummer = $row->kabel_ID;
            } else {
                $referentie_nummer = $row->volg_nummer;
            }
            $naam = "<b>" . substr($row->voor_naam, 0, 1) . ". " . $row->achter_naam . "</b>";

            echo "<tr class='view' style= 'cursor:pointer;' onclick='location.href=`details.php?type=" . $row->soort_keuring . "&id=" . $row->opdracht_nummer . "`;'><td>"
             . $row->opdracht_nummer . "</td><td>" . $soort_keuring . "</td><td>" . $referentie_nummer . "</td><td>" . $row->keuringsDatum . "</td><td>" . $naam . "</td><td>" . $akkoord . "</td></tr>";
        }
        ?>
    </table>
    </div>
</body>

</html>