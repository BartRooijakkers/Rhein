<?php
$hostName = "localhost";
$username = "root";
$password = "";
$database = "rhein";

$conn = mysqli_connect($hostName, $username, $password, $database);

if(!$conn){
    echo "Error " . mysqli_error($conn);
}

$username = $_POST['username'];
$password = $_POST['password'];

$password = hash("sha256", $password);

$sql = "SELECT gebruikers.* FROM `gebruikers` WHERE `username` = '$username' AND `password` = '$password'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
     echo "Welkom <b><i>" .$row['voor_naam']." " .$row['achter_naam'] . "</i></b>!";
     }
}else{
    echo "Gebruikersnaam / wachtwoord onjuist " . mysqli_error($conn);
}
?>