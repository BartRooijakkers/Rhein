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
    case 'addUser':
        if(empty($_POST['tussenvoegsel'])){
            insertUser($_POST['username'],$_POST['voornaam'],$_POST['achternaam'],NULL);
        }else{
            insertUser($_POST['username'],$_POST['voornaam'],$_POST['achternaam'],$_POST['tussenvoegsel']);
        }
        header("location:addUser.php?userAdded=1");
    break;
    default:
        speak($_SESSION['naam']);
        logOut();
        break;
}
?>