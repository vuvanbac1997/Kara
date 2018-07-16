<?php require_once("database.php"); ?>
<?php require_once("session.php"); ?>
<?php require_once("../pages/connection.php");?>
<?php 
    if (!isset($_SESSION['vaitro']) ||  $_SESSION['vaitro'] != 'member'){
       header('Location: ../index2.php');
    }
?>