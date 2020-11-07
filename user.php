<?php
if (@include 'functions.php') {
} else {
    echo "error";
}
switch ($_GET['action']) {
    case 'logout':
        logOut();
        break;
    case 'login':
        logIn();
        break;
    case 'addUser':
        if (empty($_POST['tussenvoegsel'])) {
            insertUser($_POST['username'], $_POST['voornaam'], $_POST['achternaam'], NULL);
        } else {
            insertUser($_POST['username'], $_POST['voornaam'], $_POST['achternaam'], $_POST['tussenvoegsel']);
        }
        header("location:addUser.php?userAdded=1");
        break;
    case 'keuring':
        global $conn;
        if (!$conn) {
            echo "Error " . mysqli_error($conn);
        }
        // waardes uit het formulier halen
        $TCVT = $_POST['TCVT'];
        $keurings_datum = $_POST['keurings_datum'];
        $uitvoerder = $_SESSION['userID'];
        $deskundige = $_POST['deskundige'];
        $opstelling_kraan = $_POST['opstelling_kraan'];
        $uitvoering_toren_haakhoogte = $_POST['uitvoering_toren_haakhoogte'];
        $soort_giek = $_POST['soort_giek'];
        $telescoopgiek_delen = $_POST['telescoopgiek_delen'];
        $opbouwgiek_meters = $_POST['opbouwgiek_meters'];
        $hulpgiek_meters = $_POST['hulpgiek_meters'];
        $fly_jib_delen = $_POST['fly-jib_delen'];
        $gieklengte = $_POST['gieklengte'];
        $topbaar = $_POST['topbaar'];
        $loopkat = $_POST['loopkat'];
        $verstelbare_giek = $_POST['verstelbare_giek'];
        $soort_stempels = $_POST['soort_stempels'];
        $tekortkomingen = $_POST['tekortkomingen'];
        $afmelden_voor = $_POST['afmelden_voor'];
        $toelichting = $_POST['toelichting'];
        $werkinstructie = $_POST['werkinstructie'];
        $kabel_leverancier = $_POST['kabel_leverancier'];
        $waarnemingen = $_POST['waarnemingen'];
        $handtekening = $_POST['handtekening'];
        $aantal_bedrijfsuren = $_POST['aantal_bedrijfsuren'];
        $afleg_redenen = $_POST['afleg_redenen'];
        //Query opstellen
        $sql = "INSERT INTO `voorbladen`(`TCVT_nummer`, `keurings_datum`, `uitvoerder`, `deskundige`, `opstelling_kraan`, `uitvoering_toren_haakhoogte`, `soort_giek`, `telescoopgiek_delen`, `opbouwgiek_meters`, `hulpgiek_meters`, `fly_jib_delen`, `gieklengte`, `topbaar`, `loopkat`, `verstelbare_giek`, `soort_stempels`, `tekortkomingen`, `afmelden_voor`, `toelichting`, `werk_instructie`, `kabel_leverancier`, `waarnemingen`, `handtekening`, `aantal_bedrijfsuren`, `afleg_redenen`)
                 VALUES ('$TCVT','$keurings_datum','$uitvoerder','$deskundige','$opstelling_kraan','$uitvoering_toren_haakhoogte','$soort_giek','$telescoopgiek_delen','$opbouwgiek_meters','$hulpgiek_meters','$fly_jib_delen','$gieklengte','$topbaar','$loopkat','$verstelbare_giek','$soort_stempels','$tekortkomingen','$afmelden_voor','$toelichting','$werkinstructie','$kabel_leverancier','$waarnemingen','$handtekening','$aantal_bedrijfsuren','$afleg_redenen')";
        switch ($_POST['typeOfTest']) {
            case 'hijstest':
                $volg_nummer = $_POST['volg_nummer'];
                $datum_opgesteld = $_POST['datum_opgesteld'];
                $hoofdgiek_lengte = $_POST['hoofdgiek_lengte'];
                $mech_sectie_gieklengte = $_POST['mech_sectie_gieklengte'];
                $hulpgiek_lengte = $_POST['hulpgiek_lengte'];
                $hoofdgiek_giekhoek = $_POST['hoofdgiek_giekhoek'];
                $hulpgiek_giekhoek = $_POST['hulpgiek_giekhoek'];
                $hijskabel_aantal_parten = $_POST['hijskabel_aantal_parten'];
                $zwenkhoek = $_POST['zwenkhoek'];
                $eigen_massa_ballast = $_POST['eigen_massa_ballast'];
                $toelaatbare_bedrijfslast = $_POST['toelaatbare_bedrijfslast'];
                $lmb_in_werking = $_POST['lmb_in_werking'];
                $proeflast = $_POST['proeflast'];
                $akkoord = $_POST['akkoord'];
                /* Als query gelukt is  voer volgende queries uit*/
                if ($conn->multi_query($sql) === TRUE) {
                    $last_id = mysqli_insert_id($conn);
                    $sql1 = "INSERT INTO hijstesten (`opdracht_nummer`,`volg_nummer`,`datum_opgesteld`,`hoofdgiek_lengte`,`mech_sectie_gieklengte`,`hulpgiek_lengte`,`hoofdgiek_giekhoek`,`hulpgiek_giekhoek`,`hijskabel_aantal_parten`,`zwenkhoek`,`eigen_massa_ballast`,`toelaatbare_bedrijfslast`,`lmb_in_werking`,`proeflast`,`akkoord`)
                    VALUES ('$last_id','$volg_nummer','$datum_opgesteld','$hoofdgiek_lengte','$mech_sectie_gieklengte','$hulpgiek_lengte','$hoofdgiek_giekhoek','$hulpgiek_giekhoek','$hijskabel_aantal_parten','$zwenkhoek','$eigen_massa_ballast','$toelaatbare_bedrijfslast','$lmb_in_werking','$proeflast','$akkoord');";
                    /* Als query gelukt is redirect naar mijnincidenten */
                    $conn->multi_query($sql1);
                    header("location:home.php?status=1");
                } else {
                    /* Wanneer de query mislukt toont hij: Error */
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                break;
            case 'kabeltest':
                echo "Kabeltest";
                $kabel_ID = $_POST['kabel_ID'];
                $draadbreuk_6D = $_POST['draadbreuk_6D'];
                $draadbreuk_30D = $_POST['draadbreuk_30D'];
                $beschadiging_buitenzijde = $_POST['beschadiging_buitenzijde'];
                $beschadiging_roest_corrosie = $_POST['beschadiging_roest_corrosie'];
                $verminderde_kabeldiameter = $_POST['verminderde_kabeldiameter'];
                $positie_meetpunten = $_POST['positie_meetpunten'];
                $beschadiging_totaal = $_POST['beschadiging_totaal'];
                $type_beschadiging_roest = $_POST['type_beschadiging_roest'];
                echo $afleg_redenen;
                break;
            default:
                echo "error";
                break;
        }
        break;
    default:
        speak($_SESSION['naam']);
        logOut();
        break;
}
?>