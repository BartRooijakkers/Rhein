<?php
session_start();
if(!isset($_SESSION['userID'])){
    header('Location:index.php'); 
}else{
    echo $_SESSION['naam'];
}
?>