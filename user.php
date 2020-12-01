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
        $input_username = $_POST['username'];
        $input_password = $_POST['password'];
        $input_firstname = ucfirst($_POST['firstname']);
        $input_lastname = ucfirst($_POST['lastname']);
        $input_division = $_POST['division'];

        if (empty($input_middlename = $_POST['middlename'])) {
            $input_middlename = null;
        } else {
            $input_middlename = $input_middlename;
        }

        $password = password_hash($input_password, PASSWORD_DEFAULT);

        $usercheck = "SELECT username FROM gebruikers WHERE username = :username";
        $statement = $conn->prepare($usercheck);
        $statement->execute(['username' => $input_username]);
        if ($statement->rowCount() > 0) {
            header("location:addUser.php?userAdded=2");
        } else {
            $sql = "INSERT INTO gebruikers(`voor_naam`,`achter_naam`,`tussenvoegsel`,`username`,`password`,`afdeling`) VALUES(:voor_naam,:achter_naam,:tussenvoegsel,:username,:pass,:afdeling);";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['voor_naam' => $input_firstname, 'achter_naam' => $input_lastname, 'tussenvoegsel' => $input_middlename, 'username' => $input_username, 'pass' => $password, 'afdeling' => $input_division]);
            header("location:addUser.php?userAdded=1");
        }
        break;
    case 'keuring':
        if($_POST['typeOfTest'] == "hijstest"){
            $soort_keuring = 1;
        }else{
            $soort_keuring = 2;
        }
        // waardes uit het formulier halen
        $TCVT = $_POST['TCVT'];
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
        /**
         * ! IETS MIS IN DIT GEDEELTE
         */
        $sql = 'INSERT INTO voorbladen(TCVT_nummer,soort_keuring,uitvoerder,deskundige,opstelling_kraan,uitvoering_toren_haakhoogte,soort_giek,telescoopgiek_delen,opbouwgiek_meters,hulpgiek_meters,fly_jib_delen,
        gieklengte,topbaar,loopkat,verstelbare_giek,soort_stempels,tekortkomingen,afmelden_voor,toelichting,werk_instructie,kabel_leverancier,waarnemingen,handtekening,aantal_bedrijfsuren,afleg_redenen)
                 VALUES (:TCVT,:soort_keuring,:uitvoerder,:deskundige,:opstelling_kraan,:uitvoering_toren_haakhoogte,:soort_giek,:telescoopgiek_delen,:opbouwgiek_meters,:hulpgiek_meters,:fly_jib_delen,
                 :gieklengte,:topbaar,:loopkat,:verstelbare_giek,:soort_stempels,:tekortkomingen,:afmelden_voor,:toelichting,:werk_instructie,:kabel_leverancier,:waarnemingen,:handtekening,:aantal_bedrijfsuren,:afleg_redenen)';
        $stmt = $conn->prepare($sql);
        $params = array("TCVT" => $TCVT, "soort_keuring" => $soort_keuring, "uitvoerder"=> $uitvoerder,'deskundige'=>$deskundige,'opstelling_kraan'=>$opstelling_kraan,
    'uitvoering_toren_haakhoogte'=>$uitvoering_toren_haakhoogte,'soort_giek'=>$soort_giek,'telescoopgiek_delen'=>$telescoopgiek_delen,'opbouwgiek_meters'=>$opbouwgiek_meters,'hulpgiek_meters'=>$hulpgiek_meters,
    'fly_jib_delen'=>$fly_jib_delen,'gieklengte'=>$gieklengte,'topbaar'=>$topbaar,'loopkat'=>$loopkat,'verstelbare_giek'=>$verstelbare_giek,'soort_stempels'=>$soort_stempels,'tekortkomingen'=>$tekortkomingen,
    'afmelden_voor'=>$afmelden_voor,'toelichting'=>$toelichting,'werk_instructie'=>$werkinstructie,'kabel_leverancier'=>$kabel_leverancier,'waarnemingen'=>$waarnemingen,'handtekening'=>$handtekening,'aantal_bedrijfsuren'=>$aantal_bedrijfsuren,
    'afleg_redenen'=>$afleg_redenen);
        $stmt->execute($params);
        $last_id = $conn->lastInsertId();
        echo "succes!";
        var_dump($params);
        
        //Set values into query
        /**
         * ? Checken welk type keuring het is
         */
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
                    if($stmt){
                    $sql = "INSERT INTO hijstesten (opdracht_nummer,volg_nummer,datum_opgesteld,hoofdgiek_lengte,mech_sectie_gieklengte,hulpgiek_lengte,hoofdgiek_giekhoek,hulpgiek_giekhoek,hijskabel_aantal_parten,zwenkhoek,eigen_massa_ballast,toelaatbare_bedrijfslast,lmb_in_werking,proeflast,akkoord)
                    VALUES (:last_id,:volg_nummer,:datum_opgesteld,:hoofdgiek_lengte,:mech_sectie_gieklengte,:hulpgiek_lengte,:hoofdgiek_giekhoek,:hulpgiek_giekhoek,:hijskabel_aantal_parten,:zwenkhoek,:eigen_massa_ballast,:toelaatbare_bedrijfslast,:lmb_in_werking,:proeflast,:akkoord);";
                    $stmt = $conn->prepare($sql);
                    //Query waarden invoegen
                    $params = array(
                        "last_id" => $last_id, "volg_nummer" => $volg_nummer, "datum_opgesteld" => $datum_opgesteld, "hoofdgiek_lengte" => $hoofdgiek_lengte, "mech_sectie_gieklengte" => $mech_sectie_gieklengte,
                        "hulpgiek_lengte" => $hulpgiek_lengte, "hoofdgiek_giekhoek" => $hoofdgiek_giekhoek, "hulpgiek_giekhoek" => $hulpgiek_giekhoek, "hijskabel_aantal_parten" => $hijskabel_aantal_parten, "zwenkhoek" => $zwenkhoek,
                        "eigen_massa_ballast" => $eigen_massa_ballast, "toelaatbare_bedrijfslast" => $toelaatbare_bedrijfslast, "lmb_in_werking" => $lmb_in_werking, "proeflast" => $proeflast, "akkoord" => $akkoord
                    );
                     $stmt->execute($params);
                    header("location:home.php?status=1");
                    }else{
                    print_r($params);
                    }
                    /* Als query gelukt is redirect naar mijnincidenten */
                    header("location:home.php?status=1");
                break;
            case 'kabeltest':
                $kabel_ID = $_POST['kabel_ID'];
                $draadbreuk_6D = $_POST['draadbreuk_6D'];
                $draadbreuk_30D = $_POST['draadbreuk_30D'];
                $beschadiging_buitenzijde = $_POST['beschadiging_buitenzijde'];
                $beschadiging_roest_corrosie = $_POST['beschadiging_roest_corrosie'];
                $verminderde_kabeldiameter = $_POST['verminderde_kabeldiameter'];
                $positie_meetpunten = $_POST['positie_meetpunten'];
                $beschadiging_totaal = $_POST['beschadiging_totaal'];
                $type_beschadiging_roest = $_POST['type_beschadiging_roest'];
                /**
                 * * Als query gelukt is: voer de volgende query uit
                 */
                if ($stmt) {
                    $sql = "INSERT INTO kabelchecklisten (opdracht_nummer,kabel_ID,draadbreuk_6D,draadbreuk_30D,beschadiging_buitenzijde, beschadiging_roest_corrosie,verminderde_kabeldiameter,positie_meetpunten,beschadiging_totaal,type_beschadiging_roest)
                    VALUES (:opdracht_nummer,:kabel_ID,:draadbreuk_6D,:draadbreuk_30D,:beschadiging_buitenzijde,:beschadiging_roest_corrosie,:verminderde_kabeldiameter,:positie_meetpunten,:beschadiging_totaal,:type_beschadiging_roest);";
                    $stmt = $conn->prepare($sql);
                    /* Als query gelukt is redirect naar mijnincidenten */
                    $params = array("opdracht_nummer" => $last_id,"kabel_ID" => $kabel_ID,"draadbreuk_6D" => $draadbreuk_6D,"draadbreuk_30D" => $draadbreuk_30D,"beschadiging_buitenzijde" => $beschadiging_buitenzijde,"beschadiging_roest_corrosie" => $beschadiging_roest_corrosie,
                    "verminderde_kabeldiameter" => $verminderde_kabeldiameter,"positie_meetpunten" => $positie_meetpunten,"beschadiging_totaal" => $beschadiging_totaal,"type_beschadiging_roest" => $type_beschadiging_roest);
                    $stmt->execute($params);
                    print_r($stmt->errorInfo());
                    header("location:home.php?status=1");
                } else {
                    print_r($params);
                    print_r($conn->errorInfo());
                }
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