<?php
$hostName = "localhost";
$username = "root";
$pass = "";
$database = "rhein";

$dsn = 'mysql:host=' . $hostName . ';dbname=' . $database;



try {
    $conn = new PDO($dsn, $username, $pass);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$TCVT = 1;
$soort = 2;
$deskundige = "jeff";
$keurings_datum = 1;

$sql = 'INSERT INTO voorbladen (TCVT_nummer,soort_keuring,keurings_datum,deskundige) VALUES(:TCVT,:soort_keuring,:keurings_datum,:deskundige)';
$stmt = $conn->prepare($sql);
$params = ['TCVT' => $TCVT, 'soort_keuring' => $soort,'keurings_datum'=> $keurings_datum, 'deskundige' => $deskundige];
var_dump($params);
echo "<br><br>";
print_r($params);
$stmt->execute($params);
echo "succes!";

?>