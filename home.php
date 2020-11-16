<?php
if (@include 'functions.php') {
} else {
    echo "error";
}
if(@$_GET['status'] == 1){
    echo "<script>alert('Keuring voltooid!');</script>";
}
?>

<html style="background:url(images/background.jpeg);">

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
            echo "<p style='text-align:center;'>Welkom <b>" . $_SESSION['naam'] . " " . $_SESSION['achternaam'] . "</b>!";
            ?>
            <br><a href="user.php?action=logout">Uitloggen</a>
        </div>
        <div class="contentTile">
            <h1 class="pageTitle">Homepage</h1>
        </div>
    </div>
    <div class="contentBox">
        <div class="contentTile">
            <?php include("include/navigatie.php"); ?>
        </div>
    </div>
    <div class="contentBox">
        <div class="choices">
            <div class="option" id="hijstest" onclick="location.href='keuring.php?keuring=hijs'"></div>
            <div class="option" id="kabeltest" onclick="location.href='keuring.php?keuring=kabel'"></div>
        </div>
    </div>
    <div class="contentBox"></div>
</body>

</html>