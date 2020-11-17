<?php
if (@include 'functions.php') {
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
            <?php include("include/navigatie.php"); ?>
        </div>
    </div>
    <!-- Start keuring formulier -->
    <form class="keuring" action="user.php?action=keuring" method="POST">
        <input type="text" id="typeOfTest" name="typeOfTest" value=""></input>
        <div class="contentBox form" style="border: 1px solid black;">
            <div class="formTitle" data-ID='jeff' onclick="toggleDisplay('voorbladen');">
                <h2>Voorbladen</h2>
            </div>
            <!-- Voorbladen formulier -->
            <ul>
                <li class="formTile voorbladen">
                    <label class="voorbladLabel" for="TCVT">TCVT-nummer:</label>
                    <input type="number" name="TCVT" placeholder="Vul TCVT nummer in" required></input>

                    <label class="voorbladLabel" for="deskundige">Deskundige:</label>
                    <input type="text" name="deskundige" placeholder="Vul deskundige in" required></input>

                    <label class="voorbladLabel" for="opstelling_kraan">Opstelling Kraan:</label>
                    <select name="opstelling_kraan" required>
                        <option disabled hidden selected>Kies Opstelling</option>
                        <option value='Railstellen'> Railstellen (spoorbreedte / wielbasis)</option>
                        <option value='Rijdend'>Rijdend</option>
                        <option value='Stationair'>Stationair</option>
                        <option value='In gietframe'>In gietframe</option>
                        <option value="Vrijstaand">Vrijstaand (kruisframe onderwagen zonder railstellen)</option>
                    </select>

                    <label class="voorbladLabel" for="uitvoering_toren_haakhoogte">Uitvoering Toren, haakhoogte:</label>
                    <input type="number" name="uitvoering_toren_haakhoogte" placeholder="Vul Uitvoering Toren in" required></input>

                    <label class="voorbladLabel" for="soort_giek">Soort Giek:</label>
                    <select name="soort_giek" onchange="console.log(this.value);" required>
                        <option disabled hidden selected>Kies Soort Giek</option>
                        <option value='Telescoop giek'>Telescoopgiek</option>
                        <option value="Opbouw giek">Opbouwgiek</option>
                        <option value="Hulp giek">Hulpgiek</option>
                        <option value="Knik giek">Knikgiek</option>
                        <option value="Mono giek">Monogiek</option>
                        <option value="Fly-jib">Fly-jib</option>
                    </select>

                    <label class="voorbladLabel" for="telescoopgiek_delen">Aantal delen <u>telescoopgiek</u>:</label>
                    <input type="number" name="telescoopgiek_delen" placeholder="Vul Aantal delen in"></input>

                    <label class="voorbladLabel" for="opbouwgiek_meters">Aantal meters <u>opbouwgiek</u>:</label>
                    <input type="number" name="opbouwgiek_meters" placeholder="Vul Aantal Meters in"></input>

                    <label class="voorbladLabel" for="hulpgiek_meters">Aantal meters <u>hulpgiek</u>:</label>
                    <input type="number" name="hulpgiek_meters" placeholder="Vul Aantal Meters in"></input>

                </li>
                <li class="formTile voorbladen">

                    <label class="voorbladLabel" for="fly-jib_delen">Aantal delen <u>Fly-jib</u>:</label>
                    <input type="number" name="fly-jib_delen" placeholder="Vul Aantal delen in"></input>

                    <label class="voorbladLabel" for="gieklengte">Uitvoering Giek Gieklengte:</label>
                    <input type="number" name="gieklengte" placeholder="Vul Gieklengte in"></input>

                    <label class="voorbladLabel" for="topbaar">Uitvoering Giek Topbaar:</label>
                    <input type="number" name="topbaar" placeholder="Vul Topbaar in"></input>
                    <!-- FIX -->
                    <label class="voorbladLabel" for="loopkat">Uitvoering Giek met Loopkat:</label>
                    Ja<input type="radio" value="1" name="loopkat" style="display: inline; margin-right:4%;" required> Nee<input type="radio" name="loopkat" style="display: inline;" value="0" checked required>
                    <!-- FIX -->
                    <label class="voorbladLabel" for="verstelbare_giek">Uitvoering Giek Verstelbare giek:</label>
                    Ja<input type="radio" value="1" name="verstelbare_giek" style="display: inline; margin-right:4%;" required> Nee<input type="radio" name="verstelbare_giek" style="display: inline;" value="0" checked required>
                    <!-- change naar vaste waarden -->
                    <label class="voorbladLabel" for="soort_stempels">Soort stempels:</label>
                    <select name="soort_stempels" required>
                        <option selected disabled hidden>Kies Soort stempels</option>
                        <option value="1">Stempels</option>
                        <option value="2">Doozerblad</option>
                    </select>

                    <label class="voorbladLabel" for="tekortkomingen">Tekortkomingen:</label>
                    Ja<input type="radio" value="1" name="tekortkomingen" style="display: inline; margin-right:4%;" required> Nee<input type="radio" name="tekortkomingen" style="display: inline;" value="0" checked required>  

                    <label class="voorbladLabel" for="afmelden_voor">Afmelden voor:</label>
                    <input type="date" name="afmelden_voor" placeholder="Vul tekortkomingen in" required></input>


                </li>
                <li class="formTile voorbladen">

                    <label class="voorbladLabel" for="toelichting">Toelichting:</label>
                    <textarea name="toelichting" placeholder="Vul toelichting in" rows="3" required></textarea>
                    
                    <label class="voorbladLabel" for="werkinstructie">Werkinstructie:</label>
                    <textarea name="werkinstructie" placeholder="Vul Werkinstructie in" rows="3" required></textarea>

                    <label class="voorbladLabel" for="kabel_leverancier">Kabelleverancier:</label>
                    <input type="text" name="kabel_leverancier" placeholder="Vul Kabelleverancier in" rows="4" required></input>

                    <label class="voorbladLabel" for="waarnemingen">Waarnemingen:</label>
                    <textarea name="waarnemingen" placeholder="Vul Waarnemingen in" rows="3" required></textarea>
                    <!-- FIX -->
                    <label class="voorbladLabel" for="handtekening">Handtekening:</label>
                    <input type="text" name="handtekening" placeholder="Vul Handtekening in" required></input>

                    <label class="voorbladLabel" for="aantal_bedrijfsuren">Aantal bedrijfsuren:</label>
                    <input type="number" name="aantal_bedrijfsuren" placeholder="Vul Aantal bedrijfsuren in" required></input>

                    <label class="voorbladLabel" for="afleg_redenen">Afleg Redenen:</label>
                    <textarea name="afleg_redenen" placeholder="Vul Afleg redenen in" rows="3" required></textarea>
                </li>
            </ul>
            <div class="formTitle" data-ID='jeff' onclick="toggleDisplay('testUitvoeren');">
                <h2 id="keuringType">Voorbladen</h2>
            </div>
            <?php
            switch ($_GET['keuring']) {
                case 'kabel':
                    include("include/kabeltest.php");
                    echo "<script> document.getElementsByClassName('pageTitle')[0].innerHTML ='Kabeltest', document.getElementById('typeOfTest').value = 'kabeltest', document.getElementById('keuringType').innerHTML = 'Kabel Keuring';</script>";
                    break;
                case 'hijs':
                    include("include/hijstest.php");
                    echo "<script> document.getElementsByClassName('pageTitle')[0].innerHTML ='Hijstest', document.getElementById('typeOfTest').value = 'hijstest', document.getElementById('keuringType').innerHTML = 'Hijs Keuring';;</script>";
                    break;

                default:
                    header('location:home.php');
                    break;
            }
            ?>

        </div>
        <button>Versturen</button>
    </form>

</body>
<script src='javascript/functions.js'></script>
<script>
    toggleDisplay('voorbladen');
</script>

</html>