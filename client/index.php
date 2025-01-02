<?php
session_start();
if(!isset($_SESSION['id_user'])){
    header("location: ../Se_Connecter.php");
    exit;
}else if (!isset($_SESSION['id_user']) && $_SESSION['role'] == 'user'){
    header("location: client/pages/Livers.php");
}
?>