<?php
session_start();
include_once '../Model/mainfunction.php';
$usuari = $_POST['usuari'];
$contra = $_POST['contra'];
$connexio_real = connexio();
    $error = "";
     $statement = $connexio_real->prepare("SELECT * FROM usuaris WHERE usuari = ?");
    $statement->bindParam(1,$usuari);
    $statement->execute();
//  Comprovem que l'usuari existeix a la base de dades
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      if ($usuari != $row["usuari"] || $usuari == null || (!password_verify($contra,$row["contrasenya"]))){
        $error = "No s'ha posat l'usuari o la contrasenya correctament";
        include '../Vista/index.vista.php';
      } else {
          $_SESSION['usuari'] = $usuari;
          $_SESSION['contra'] = $contra;
          include 'index.logat.php';
        }
    }

?>