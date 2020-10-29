<?php
if (@include 'functions.php') {
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
            <h1 class="pageTitle">Homepage</h1>
        </div>
    </div>
    <div class="contentBox">
        <div class="contentTile">
            <div id="nav">
                <a class="route" href="home.php">Home</a>
                <a class="route" href="overzichten.php">Overzichten</a>
                <a class="route" href="index.php"></a>
            </div>
        </div>
    </div>
    <div class="contentBox">
        <div class="choices">
            <div class="option" id="hijstest"></div>
            <div class="option" id="kabeltest"></div>
        </div>
    </div>
    <div class="contentBox"></div>
</body>

</html>