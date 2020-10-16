<?php
$database = "od_rhein";
$username = "root";
$password = "";
$hostName = "localhost";

$conn = mysqli_connect($hostName, $username, $password, $database);

if (!$conn) {
    die("Connection failed " . mysqli_connect_error());
}

// Gegevens uit opdracht informatie kopje
$opdrachtnummer = $_POST["Opdrachtnummer"];
$werkInstructie = $_POST["werkInstructie"];
$datum = $_POST["datePicker"];
$kabel_leverancier = $_POST["kabel_leverancier"];
$opmerkingen = $_POST["opmerkingen"];
$bedrijfsuren = $_POST["bedrijfsuren"];
$reden_keuring = $_POST["reden_keuring"];
//$signature = $_POST["signature"];

// Gegevens uit keuring lijst
$kabelID = $_POST["kabelID"];
$breuk_6D = $_POST["breuk_6D"];
$breuk_30D = $_POST["breuk_30D"];
$beschadiging_buitenzijde = $_POST["beschadiging_buitenzijde"];
$beschadiging_roest_corrosie = $_POST["beschadiging_roest_corrosie"];
$verminderde_Kabeldiameter = $_POST["verminderde_Kabeldiameter"];
$positie_Meetpunten = $_POST["positie_Meetpunten"];
$beschadiging_totaal = $_POST["beschadiging_totaal"];
$type_beschadiging_roest = $_POST["type_beschadiging_roest"];

$sql = "INSERT INTO opdrachten (opdracht_ID, werk_instructie,kabel_leverancier,comments,signature,bedrijfs_uren,reden_keuring,keuringsDatum)
VALUES ('$opdrachtnummer','$werkInstructie','$kabel_leverancier','$opmerkingen',3,'$bedrijfsuren', '$reden_keuring', '$datum')";

if ($conn->query($sql) === TRUE){
    $sql1 = "INSERT INTO kabelchecklisten (kabel_ID,opdracht_ID,zichtbaarBreuk_6D,zichtbaarBreuk_30D,beschadiging_buitzenzijde,beschadiging_roest_corrosie,verminderde_kabeldiameter,positie_meetpunten,beschadiging_totaal,type_beschadiging_roest)
    VALUES ('$kabelID', '$opdrachtnummer', '$breuk_6D','$breuk_30D','$beschadiging_buitenzijde','$beschadiging_roest_corrosie','$verminderde_Kabeldiameter','$positie_Meetpunten','$beschadiging_totaal','$type_beschadiging_roest')";
    mysqli_query($conn,$sql1);
    echo "test uitgevoerd!<br><a href='index.php'>Terug naar hoofdmenu</a>";
}else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>