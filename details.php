<?php
if (@include 'functions.php') {
    $id = $_GET['id'];
    switch($_GET['type']){
        case 1:
            $type = "Hijstest";
        break;
        case 2:
            $type = "Kabeltest";
        break;
        default:
            $type = "Keuring";
        break;
    }
} else {
    echo "error";
}

global $conn;

$sql = "SELECT voorbladen.*, hijstesten.*, gebruikers.voor_naam, gebruikers.achter_naam, CAST(voorbladen.keurings_datum AS date) 'keuringsDatum', CAST(hijstesten.datum_opgesteld AS date) 'datumOpgesteld' FROM voorbladen INNER JOIN hijstesten ON voorbladen.opdracht_nummer = hijstesten.opdracht_nummer INNER JOIN gebruikers ON voorbladen.uitvoerder = gebruikers.gebruiker_ID WHERE voorbladen.opdracht_nummer = $id;";

$result = mysqli_query($conn, $sql);
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
            <h1 class="pageTitle">Keuring details</h1>
        </div>
    </div>
    <div class="contentBox">
        <div class="contentTile">
            <?php include("include/navigatie.php"); ?>
        </div>
    </div>
    <table>
        <tr>
            <th>Opdracht Nummer</th>
            <th>TCVT Nummer</th>
            <th>Keurings Datum</th>
            <th>Datum opgesteld</th>
            <th>Hoofdgiek Len.</th>
        </tr>
        <tr>
        <?php
       if(mysqli_num_rows($result) == 1){
        while($row = mysqli_fetch_assoc($result)){
            $naam = substr($row['voor_naam'], 0,1) . ". " . $row['achter_naam'];
            echo "<td>" . $row['opdracht_nummer'] . "</td><td>" . $row['TCVT_nummer'] . "</td><td>" . $row['keuringsDatum']. "</td><td>" . $row['datumOpgesteld'] . "</td><td>" . $row['hoofdgiek_lengte']. "</td>";
        }
    } else{
        echo "Error " . mysqli_error($conn);
    }
        ?>
        </tr>
    </table>
</body>
<script> document.getElementsByClassName('pageTitle')[0].innerHTML= "Details <?php echo $type ?>: #" +<?php echo $id ?>;</script>
</html>