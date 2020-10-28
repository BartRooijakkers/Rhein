<?php 
$hostName = "localhost";
$username = "root";
$password = "";
$database = "rhein";

$conn = mysqli_connect($hostName, $username, $password, $database);

if(!$conn){
    echo "Error " . mysqli_error($conn);
}

$sql = "SELECT * FROM voorbladen INNER JOIN keuringsitems ON voorbladen.opdracht_nummer = keuringsitems.opdracht_nummer INNER JOIN kabelchecklisten ON voorbladen.opdracht_nummer = kabelchecklisten.opdracht_nummer
 INNER JOIN hijstesten ON voorbladen.opdracht_nummer = hijstesten.opdracht_nummer INNER JOIN gebruikers ON gebruikers.gebruiker_ID = voorbladen.uitvoerder";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
  
    while($row = mysqli_fetch_assoc($result)){
        echo $row['opdracht_nummer'] . "<br>" . $row['voor_naam'] . "<br>" . $row['gebruiker_ID'] . "<br>" . $row['keurings_datum'] . "<br>" . $row['hoofdgiek_lengte'];
        
    }
} else{
    echo "error";
}
?>