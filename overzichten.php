<?php
if (@include 'functions.php') {
} else {
    echo "error";
}
$hostName = "localhost";
$username = "root";
$password = "";
$database = "rhein";

$conn = mysqli_connect($hostName, $username, $password, $database);

$sql = "SELECT hijstesten.opdracht_nummer, hijstesten.volg_nummer, CAST(hijstesten.datum_opgesteld AS DATE), hijstesten.akkoord FROM hijstesten";

$result = mysqli_query($conn, $sql);
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
            <h1 class="pageTitle">Overzichten</h1>
        </div>
    </div>
    <div class="contentBox">
        <div class="contentTile">
            <?php include("navigatie.php"); ?>
        </div>
    </div>
    <table>
        <tr>
            <th>Opdracht Nummer</th>
            <th>Volg nummer</th>
            <th>Datum</th>
            <th>Akkoord</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                switch ($row['akkoord']) {
                    case 1:
                        $akkoord = "<p style='color:green; font-weight:bold;'>Goedgekeurd</p>";
                        break;
                    case 2:
                        $akkoord = "<p style='color:red; font-weight:bold;'>Afgewezen</p>";
                        break;
                }
                echo "<tr onclick='location.href=`details.php?id=".$row['opdracht_nummer']."`;'><td>" . $row['opdracht_nummer'] . "</td><td>" . $row['volg_nummer'] . "</td><td>" . $row['CAST(hijstesten.datum_opgesteld AS DATE)'] . "</td><td>" . $akkoord . "</td></tr>";
            }
        }
        ?>
    </table>
</body>

</html>