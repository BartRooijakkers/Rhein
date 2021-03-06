<?php
   $hostName = "localhost";
   $username = "root";
   $pass = "";
   $database = "rhein";

   $dsn= 'mysql:host='.$hostName.';dbname='.$database;

  
// Connectie
   try{
    $conn = new PDO($dsn, $username, $pass);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }
   catch(\PDOException $e){
       throw new \PDOException($e->getMessage(), (int)$e->getCode());
   }

session_start();
if (!isset($_SESSION['userID'])) {
    header('Location:index.php');
}

function logOut(){
    session_unset();
    session_destroy();
    header('Location:index.php?status=1'); 
    global $conn;
    $conn = null;
}

function logIn(){
    global $conn;

    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    $sql = "SELECT * FROM gebruikers WHERE username = :username";
    $stmt = $conn->prepare($sql);

    $stmt->execute(['username' => $input_username]);
//Controleren of gebruiker bestaat
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch()) {
            //Verifieren van wachtwoord
            if (password_verify($input_password, $row->password) && $row->account_status == 1) {
                //Wachtwoord uit opgehaalde data halen
                unset($row->password);
                session_start();
                //Sessie data opzetten
                $_SESSION['userID'] = $row->gebruiker_ID;
                $_SESSION['username'] = $input_username;
                $_SESSION['naam'] = $row->voor_naam;
                $_SESSION['achternaam'] = $row->achter_naam;
                $_SESSION['afdeling'] = $row->afdeling;
                //Update last_login time
                $update_last_login = $conn->prepare("UPDATE gebruikers SET last_login = CURRENT_TIMESTAMP WHERE gebruiker_ID = :userID");
                $update_last_login->execute(['userID'=>$row->gebruiker_ID]);
            } else {
                header('Location:index.php?status=2');
                return;
            }
        }
        header('Location:home.php');
    }else{
        header('Location:index.php?status=3');
    }
}

function insertUser($username,$voornaam,$achternaam,$tussenvoegsel){
    global $conn;
    $sql = "INSERT INTO gebruikers(`voor_naam`,`achter_naam`,`tussenvoegsel`,`username`) VALUES(:voor_naam,:achter_naam,:tussenvoegsel,:username);";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['voor_naam' =>$voornaam,'achter_naam'=>$achternaam, 'tussenvoegsel' => $tussenvoegsel, 'username' => $username]);
    echo "<script> alert('Gebruiker:" . $_POST['username'] . "toegevoegd!');</script>";
}

?>