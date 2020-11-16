<?php
if (@include 'functions.php') {
    $id = $_GET['id'];
    switch ($_GET['type']) {
        case 1:
            $type = "Hijstest";
            $sql = "SELECT voorbladen.*, hijstesten.*, gebruikers.voor_naam, gebruikers.achter_naam, CAST(voorbladen.keurings_datum AS date) 'keuringsDatum',CAST(voorbladen.afmelden_voor AS date) 'afmeldDatum' ,CAST(hijstesten.datum_opgesteld AS date) 'datumOpgesteld' FROM voorbladen INNER JOIN hijstesten ON voorbladen.opdracht_nummer = hijstesten.opdracht_nummer INNER JOIN gebruikers ON voorbladen.uitvoerder = gebruikers.gebruiker_ID WHERE voorbladen.opdracht_nummer = :id;";
            break;
        case 2:
            $type = "Kabeltest";
            $sql = "SELECT voorbladen.*, kabelchecklisten.*, gebruikers.voor_naam, gebruikers.achter_naam, CAST(voorbladen.keurings_datum AS date) 'keuringsDatum',CAST(voorbladen.afmelden_voor AS date) 'afmeldDatum' FROM voorbladen INNER JOIN kabelchecklisten ON voorbladen.opdracht_nummer = kabelchecklisten.opdracht_nummer INNER JOIN gebruikers ON voorbladen.uitvoerder = gebruikers.gebruiker_ID WHERE voorbladen.opdracht_nummer = :id;";
            break;
        default:
            $type = "Keuring";
            break;
    }
} else {
    echo "error";
}


$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $id]);

while ($row = $stmt->fetch()) {
    $naam = substr($row->voor_naam, 0, 1) . ". " . $row->achter_naam;
    $data = $row;
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
            <h1 class="pageTitle">Keuring details</h1>
        </div>
    </div>
    <div class="contentBox">
        <div class="contentTile">
            <?php include("include/navigatie.php"); ?>
        </div>
    </div>
    <div class="contentBox">
        <div class="contentTileAuto" style="border: 1px solid black; 
    box-shadow: inset 0 0 0 1000px #fff2ccd3;">
            <div class="generalInfo">
                <h1 style="color:green;">General info</h1>
                <span class="header">Opdracht Nummer:</span>
                <span><?php echo $data->opdracht_nummer ?></span>
                <hr>
                <span class="header">TCVT Nummer:</span>
                <spam><?php echo $data->TCVT_nummer ?></spam>
                <hr>
                <span class="header">Keurings datum: </span>
                <span><?php echo $data->keuringsDatum ?></span>
                <hr>
                <span class="header">Uitvoerder: </span>
                <span><?php echo $naam ?></span>
                <hr>
                <span class="header">Deskundige: </span>
                <span><?php echo $data->deskundige ?></span>
                <hr>
                <span class="header">Opstelling kraan: </span>
                <span><?php echo $data->opstelling_kraan ?></span>
                <hr>
                <span class="header">Uitvoering toren haakhoogte: </span>
                <span><?php echo $data->uitvoering_toren_haakhoogte ?></span>
                <hr>
                <span class="header">Soort giek:</span>
                <span><?php echo $data->soort_giek ?></span>
                <hr>
                <span class="header">Telescoopgiek Delen:</span>
                <span><?php echo $data->telescoopgiek_delen ?></span>
                <hr>
                <span class="header">Opbouwgiek Meters: </span>
                <span><?php echo $data->opbouwgiek_meters ?></span>
                <hr>
                <span class="header">Hulpgiek Meters: </span>
                <span><?php echo $data->hulpgiek_meters ?></span>
                <hr>
                <span class="header">Fly-jib delen: </span>
                <span><?php echo $data->fly_jib_delen ?></span>
                <hr>
                <span class="header">Giek Lengte:</span>
                <span><?php echo $data->gieklengte ?></span>
            </div>
            <div class="generalInfo">
                <span class="header">Topbaar: </span>
                <span><?php echo $data->topbaar ?></span>
                <hr>
                <span class="header">Loopkat: </span>
                <span><?php echo $data->loopkat ?></span>
                <hr>
                <span class="header">Verstelbare giek:</span>
                <span><?php echo $data->verstelbare_giek ?></span>
                <hr>
                <span class="header">Soort Stempels: </span>
                <span><?php echo $data->soort_stempels ?></span>
                <hr>
                <span class="header">Tekortkomingen</span>
                <span><?php echo $data->tekortkomingen ?></span>
                <hr>
                <span class="header">Afmelden voor:</span>
                <span><?php echo $data->afmeldDatum ?></span>
                <hr>
                <span class="header">Toelichting: </span>
                <span><?php echo $data->toelichting ?></span>
                <hr>
                <span class="header">Werk Instructie: </span>
                <span><?php echo $data->werk_instructie ?></span>
                <hr>
                <span class="header">Kabelleverancier: </span>
                <span><?php echo $data->kabel_leverancier ?></span>
                <hr>
                <span class="header">Waarnemingen: </span>
                <span><?php echo $data->waarnemingen ?></span>
                <hr>
                <span class="header">Handtekening:</span>
                <span><?php echo $data->handtekening ?></span>
                <hr>
                <span class="header">Aantal bedrijfsuren: </span>
                <span><?php echo $data->aantal_bedrijfsuren ?></span>
                <hr>
                <span class="header">Afleg Redenen: </span>
                <span><?php echo $data->afleg_redenen ?></span>
            </div>
        </div>
        <div class="contentTileAuto">

        </div>
    </div>
</body>
<script>
    document.getElementsByClassName('pageTitle')[0].innerHTML = "Details <?php echo $type ?>: #" + <?php echo $id ?>;
</script>

</html>