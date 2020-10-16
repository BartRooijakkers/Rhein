<?php
$database = "od_rhein";
$username = "root";
$password = "";
$hostName = "localhost";

$conn = mysqli_connect($hostName, $username, $password, $database);

if (!$conn) {
    die("Connection failed " . mysqli_connect_error());
}
/*
$sql = "SELECT * FROM gebruiker";
//, opdrachten.*, DAYNAME(opdrachten.keuringsDatum) INNER JOIN opdrachten on opdrachten.gebruiker_ID = gebruiker.gebruiker_ID

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<b>User ID:</b> " . $row['gebruiker_ID'] . "<br><b>Name:</b> " . $row['voor_naam'] . " " . $row['achter_naam'] . "<br> <b>Username:</b> " . $row["user_name"] . "<br>" . "<br><br>";
    }
} else {
    echo "error";
}
*/
?>


<html>

<head>
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css">
</head>

<body>
    <form action="sendKeuring.php" method="POST">
        <div id="opdrachtInput">
            <h3>Opdracht Informatie</h3>
            <label for="opdrachtnummer">Opdrachtnummer: </label>
            <input type="number" name="Opdrachtnummer" required></input>
            <label for="werkInstructie">Werkinstructie: </label>
            <input type="text" name="werkInstructie" required></input>
            <label for="datum">Datum: </label>
            <input type="date" name="datePicker" id="datePicker"></input>
            <label for="kabel_leverancier">Kabelleverancier: </label>
            <input type="text" name="kabel_leverancier" required></input>
            <label for="reden_keuring">Reden van keuring: </label>
            <input type="text" name="reden_keuring" required></input>
            <label for="bedrijfsuren">Bedrijfsuren: </label>
            <input type="number" name="bedrijfsuren" required></input>
            <label for="opmerkingen">Opmerkingen: </label>
            <input type="text" name="opmerkingen"></input>
            <label for="signature">Handtekening: </label>
            <input type="file" name="signature" required></input>
        </div>
        <div id="keuringInput">
            <h3>Keuring lijst</h3>
            <label for="kabelID">Kabel ID: </label>
            <input type="number" name="kabelID" required></input>
            <label for="breuk_6D">Aantal draadbreuken van 6D: </label>
            <input type="number" name="breuk_6D" required></input>
            <label for="breuk_30D">Aantal draadbreuken van 30D: </label>
            <input type="number" name="breuk_30D" required></input>
            <label for="beschadiging_buitenzijde">Beschadiging van buitenzijde gelegen draden: </label>
            <select name="beschadiging_buitenzijde">
                <option selected value="0">Geen Beschadiging</option>
                <option value="1">Gering</option>
                <option value="2">Gemiddeld</option>
                <option value="3">Hoog</option>
                <option value="4">Zeer Hoog</option>
                <option value="5">Afleggen</option>
            </select>
            <label for="beschadiging_roest_corrosie">Roest en corrosie mate van beschadiging: </label>
            <select name="beschadiging_roest_corrosie">
                <option selected value="0">Geen Beschadiging</option>
                <option value="1">Gering</option>
                <option value="2">Gemiddeld</option>
                <option value="3">Hoog</option>
                <option value="4">Zeer Hoog</option>
                <option value="5">Afleggen</option>
            </select>
            <label for="Verminderde_Kabeldiameter">Verminderde Kabeldiameter in %: </label>
            <input type="number" name="verminderde_Kabeldiameter" required></input>
            <!--  onselect="toNumber(this.value)" onmouseout="showPercentage(this.value)" onclick="toNumber(this.value)"  onchange="showPercentage(this.value)"  -->
            <label for="Positie_Meetpunten">Positie Meetpunten: </label>
            <input type="number" name="positie_Meetpunten" required></input>
            <label for="beschadiging_totaal">Totale mate van beschadiging: </label>
            <select name="beschadiging_totaal">
                <option selected value="0">Geen Beschadiging</option>
                <option value="1">Gering</option>
                <option value="2">Gemiddeld</option>
                <option value="3">Hoog</option>
                <option value="4">Zeer Hoog</option>
                <option value="5">Afleggen</option>
            </select>
            <label for="type_beschadiging_roest">Type beschadiging en roestvorming: </label>
            <input type="number" name="type_beschadiging_roest" required></input>
        </div>
        <button>Submit</button>
    </form>
</body>
<script>
    document.getElementById('datePicker').valueAsDate = new Date();

    /*
        function showPercentage(procent) {
            document.getElementById("Verminderde_Kabeldiameter").value = "";
            document.getElementById("Verminderde_Kabeldiameter").type = "text";
            procent = procent.replace("%", "");
            document.getElementById("Verminderde_Kabeldiameter").value = procent + "%";
        }

        function toNumber(number) {
            number = number.replace("%", "");
            console.log(number);
            document.getElementById("Verminderde_Kabeldiameter").type = "number";
            document.getElementById("Verminderde_Kabeldiameter").value = number;


        }
        */
</script>

</html>