<?php
if (@include 'functions.php') {
} else {
    echo "error";
}
switch ($_GET['action']) {
    case 'logout':
        logOut();
        break;
    case 'login':
        logIn();
        break;
    
    default:
        speak($_SESSION['naam']);
        logOut();
        break;
}
?>