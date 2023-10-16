<?php

$usuari = $_POST['usuari'];
$email = $_POST['email'];
$contra = $_POST['contra'];
$contra2 = $_POST['contra2'];

$error = "";
function connexio(){
  $dbname = 'pt04_benito_martinez';
  $username = 'root';
  $password = '';
  $connexio = new PDO("mysql:host=localhost;dbname=$dbname",$username,$password);
return $connexio;
}

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error =   "El DNI no es válido.";
    include 'registrar.vista.php';
    } elseif ($contra != $contra2 || $contra == null){

      $error =   "Les contrasenyes no són iguals/han de contenir alguna dada.";
      include 'registrar.vista.php';
      }
      else {
        try {
          $connexio_real = connexio();
          error_reporting(0);
          
          // Fem la secuencia per insertar l'usuari
          $statement = $connexio_real->prepare("INSERT INTO usuaris (usuari, email, contrasenya, contrasenya2) VALUES (?,?,?,?)");
          $statement->bindParam(1,$usuari);
          $statement->bindParam(2,$email);
          $statement->bindParam(3,$contra);
          $statement->bindParam(4,$contra2);
          
          $error =  "Insertat correctament";
              $statement->execute();
          
          
          }catch (Exception $e) {
              echo "Error:" .  $e->getMessage();
          }
          include 'index.php';
      }






?>