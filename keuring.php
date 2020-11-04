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
            <h1 class="pageTitle">Keuring</h1>
        </div>
    </div>
    <div class="contentBox">
        <div class="contentTile">
            <?php include("navigatie.php"); ?>
        </div>
    </div>
    <!-- Start keuring formulier -->
    <form class="keuring" action="user.php?action=addTest" method="POST">
        <div class="contentBox" style="border: 1px solid black;">
            <div class="formTitle" data-ID='jeff' onclick="toggleDisplay('voorbladen');">
                <h2>Voorbladen</h2>
            </div>
            <div class="contentTile">
                <!-- Voorbladen formulier -->
                <div class="formTile" id="voorbladen">
                    <label class="voorbladLabel" for="TCVT">TCTV-nummer:</label>
                    <input type="number" name="TCVT" placeholder="Vul TCVT nummer in" required></input>

                    <label class="voorbladLabel" for="keurings_datum">Keuringsdatum:</label>
                    <input type="date" name="keurings_datum" required></input>

                    <label class="voorbladLabel" for="deskundige">Deskundige:</label>
                    <input type="text" name="deskundige" placeholder="Vul deskundige in" required></input>

                    <label class="voorbladLabel" for="opstelling_kraan">Opstelling Kraan:</label>
                    <select name="opstelling_kraan" required>
                        <option disabled hidden selected>Kies Opstelling</option>
                        <option value='railstellen'> Railstellen (spoorbreedte / wielbasis)</option>
                        <option value='rijdend'>Rijdend</option>
                        <option value='stationair'>Stationair</option>
                        <option value='in_gietframe'>In gietframe</option>
                        <option value="vrijstaand">Vrijstaand (kruisframe onderwagen zonder railstellen)</option>
                    </select>

                    <label class="voorbladLabel" for="uitvoering_toren_haakhoogte">Uitvoering Toren, haakhoogte:</label>
                    <input type="number" name="uitvoering_toren_haakhoogte" placeholder="Vul Uitvoering Toren in" required></input>

                    <label class="voorbladLabel" for="soort_giek">Soort Giek:</label>
                    <select name="soort_giek" onchange="console.log(this.value);" required>
                        <option disabled hidden selected>Kies Soort Giek</option>
                        <option value='telescoop_giek'>Telescoopgiek</option>
                        <option value="opbouw_giek">Opbouwgiek</option>
                        <option value="hulp_giek">Hulpgiek</option>
                        <option value="knik_giek">Knikgiek</option>
                        <option value="mono_giek">Monogiek</option>
                        <option value="Fly-jib">Fly-jib</option>
                    </select>

                    <label class="voorbladLabel" for="telescoopgiek_delen">Aantal delen <u>telescoopgiek</u>:</label>
                    <input type="number" name="telescoopgiek_delen" placeholder="Vul Aantal delen in"></input>

                    <label class="voorbladLabel" for="opbouwgiek_meters">Aantal meters <u>opbouwgiek</u>:</label>
                    <input type="number" name="opbouwgiek_meters" placeholder="Vul Aantal Meters in"></input>

                    <label class="voorbladLabel" for="hulpgiek_meters">Aantal meters <u>hulpgiek</u>:</label>
                    <input type="number" name="hulpgiek_meters" placeholder="Vul Aantal Meters in"></input>

                    <label class="voorbladLabel" for="fly-jib_delen">Aantal delen <u>Fly-jib</u>:</label>
                    <input type="number" name="fly-jib_delen" placeholder="Vul Aantal delen in"></input>

                    <label class="voorbladLabel" for="gieklengte">Uitvoering Giek Gieklengte:</label>
                    <input type="number" name="gieklengte" placeholder="Vul Gieklengte in"></input>

                    <label class="voorbladLabel" for="topbaar">Uitvoering Giek Topbaar:</label>
                    <input type="number" name="topbaar" placeholder="Vul Topbaar in"></input>
                    <!-- FIX -->
                    <label class="voorbladLabel" for="loopkat">Uitvoering Giek met Loopkat:</label>
                    <input type="checkbox" name="loopkat" required></input>
                    <!-- FIX -->
                    <label class="voorbladLabel" for="verstelbare_giek">Uitvoering Giek Verstelbare giek:</label>
                    <input type="checkbox" name="verstelbare_giek" required></input>
                    <!-- change naar vaste waarden -->
                    <label class="voorbladLabel" for="soort_stempels">Soort stempels:</label>
                    <input type="number" name="soort_stempels" placeholder="Vul soort stempels in"></input>

                    <label class="voorbladLabel" for="tekortkomingen">Tekortkomingen:</label>
                    <input type="number" name="tekortkomingen" placeholder="Vul tekortkomingen in" required></input>

                    <label class="voorbladLabel" for="afmelden_voor">Afmelden voor:</label>
                    <input type="date" name="afmelden_voor" placeholder="Vul tekortkomingen in" required></input>

                    <label class="voorbladLabel" for="toelichting">Toelichting:</label>
                    <textarea name="toelichting" placeholder="Vul toelichting in" required></textarea>

                    <label class="voorbladLabel" for="werkinstructie">Werkinstructie:</label>
                    <textarea name="werkinstructie" placeholder="Vul Werkinstructie in" required></textarea>

                    <label class="voorbladLabel" for="kabel_leverancier">Kabelleverancier:</label>
                    <textarea name="kabel_leverancier" placeholder="Vul Kabelleverancier in" required></textarea>

                    <label class="voorbladLabel" for="waarnemingen">Waarnemingen:</label>
                    <textarea name="waarnemingen" placeholder="Vul Waarnemingen in" required></textarea>
                    <!-- FIX -->
                    <label class="voorbladLabel" for="handtekening">Handtekening:</label>
                    <textarea name="handtekening" placeholder="Vul Handtekening in" required></textarea>

                    <label class="voorbladLabel" for="handtekening">Aantal bedrijfsuren:</label>
                    <input type="number" name="handtekening" placeholder="Vul Aantal bedrijfsuren in" required></input>

                    <label class="voorbladLabel" for="afleg_redenen">Afleg Redenen:</label>
                    <textarea name="afleg_redenen" placeholder="Vul Afleg redenen in" required></textarea>
                </div>
            </div>
            <div class="formTitle" data-ID='jeff' onclick="toggleDisplay('keuring');">
                <h2>Voorbladen</h2>
            </div>
            <div class="contentTile">
                <div class="formTile" id="keuring">
                    sdasdas
                </div>
            </div>
        </div>
    </form>

</body>
<script src='javascript/functions.js'></script>
<?php
switch ($_GET['keuring']) {
    case 'kabel':
        echo "<script> document.getElementsByClassName('pageTitle')[0].innerHTML ='Kabeltest', document.getElementById('typeOfTest').value = 'kabeltest';</script>";
        break;
    case 'hijs':
        echo "<script> document.getElementsByClassName('pageTitle')[0].innerHTML ='Hijstest', document.getElementById('typeOfTest').value = 'hijstest';</script>";
        break;

    default:
        header('location:home.php');
        break;
}
?>

</html>