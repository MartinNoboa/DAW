<?php
    require_once 'util.php';

    $idLugar = $_POST["lugar"];
    $idIncidente = $_POST["incidente"];
    
    agregarIncidente($idLugar, $idIncidente);
    header("location:index.php");

?>