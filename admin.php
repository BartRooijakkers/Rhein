<?php
if (@include 'functions.php') {
    if ($_SESSION['afdeling'] != 12) {
        echo "<script> alert('U beschikt niet over admin rechten');</script>";
        header('Location:home.php');
    }
} else {
    echo "error";
}
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
            <h1 class="pageTitle">Admin Pagina</h1>
        </div>
    </div>
    <div class="contentBox">
        <div class="contentTile">
            <?php include("include/navigatie.php"); ?>
        </div>
    </div>
    <div class="contentBox">
        <div class="choices">
            <a href="userList.php"><div class="option" id="userList"></div></a>
            <a href="userRequests.php"><div class="option" id="gebruikerToevoegen"></div></a>
        </div>
    </div>
    <div class="contentBox"></div>
</body>

</html>