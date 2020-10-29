<?php
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
    $hostName = "localhost";
    $username = "root";
    $password = "";
    $database = "rhein";

    $conn = mysqli_connect($hostName, $username, $password, $database);

    if (!$conn) {
        echo "Error " . mysqli_error($conn);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = hash("sha256", $password);

    $sql = "SELECT gebruikers.* FROM `gebruikers` WHERE `username` = '$username' AND `password` = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['userID'] = $row['gebruiker_ID'];
            $_SESSION['user'] = $username;
            $_SESSION['naam'] = $row['voor_naam'];
            $_SESSION['achternaam'] = $row['achter_naam'];
            $_SESSION['afdeling'] = $row['afdeling'];
            header('Location:home.php');
        }
    } else {
        header('Location:index.php?status=2');
    }
}
?>