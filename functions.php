<?php
   $hostName = "localhost";
   $username = "root";
   $pass = "";
   $database = "rhein";

   $dsn= 'mysql:host='.$hostName.';dbname='.$database;

  

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

function speak($name){
 echo "Welkom <b>". $name . "</b>!<br>";
}

function logOut(){
    session_unset();
    session_destroy();
    header('Location:index.php?status=1'); 
}

function logIn(){
    global $conn;

    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = hash("sha256", $password);

    $sql = "SELECT gebruikers.* FROM `gebruikers` WHERE `username` = :username AND `password` = :pass";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['username' =>$username, 'pass' =>$password]);
    if($stmt->rowCount() > 0){
        while($row = $stmt->fetch()){
            session_start();
            $_SESSION['userID'] = $row->gebruiker_ID;
            $_SESSION['user'] = $username;
            $_SESSION['naam'] = $row->voor_naam;
            $_SESSION['achternaam'] = $row->achter_naam;
            $_SESSION['afdeling'] = $row->afdeling;
        }
            header('Location:home.php');
    } else {
        header('Location:index.php?status=2');
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