<?php 
$hostName = "localhost";
$username = "root";
$password = "";
$database = "rhein";

$conn = mysqli_connect($hostName, $username, $password, $database);

if(!$conn){
    echo "Error " . mysqli_error($conn);
}else{
    echo "succes!<br><br>";
}

$sql = "SELECT * FROM gebruikers";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
  
    while($row = mysqli_fetch_assoc($result)){
        echo "<b>Gebruikers ID:</b> ". $row['gebruiker_ID']."<br><b>Naam:</b> " . $row['voor_naam']. "<br> <b>Achternaam:</b> ". $row['achter_naam']."<br><br>";
    }
}
?>