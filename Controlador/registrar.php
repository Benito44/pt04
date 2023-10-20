<?php

function duplicatNOM($data){
  $connexio_real = connexio();
  $statement = $connexio_real->prepare("SELECT usuari FROM usuaris WHERE usuari = '$data'");
  $statement->execute();
  $data_mostrada = "";
  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $data_mostrada = $row["usuari"];
  }
  return $data_mostrada;
}    
function duplicatEMAIL($data){
  $connexio_real = connexio();
  $statement = $connexio_real->prepare("SELECT email FROM usuaris WHERE email = '$data'");
  $statement->execute();
  $data_mostrada = "";
  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $data_mostrada = $row["email"];
  }
  return $data_mostrada;
}   

$usuari = $_POST['usuari'];
$email = $_POST['email'];
$contra = $_POST['contra'];
$contra2 = $_POST['contra2'];

$error = "";
function connexio(){
  $dbname = 'pt03_benito_martinez';
  $username = 'root';
  $password = '';
  $connexio = new PDO("mysql:host=localhost;dbname=$dbname",$username,$password);
return $connexio;
}

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error =   "Correu electrònic no es válido.";
    include '../Vista/registrar.vista.php';
    } elseif ($contra != $contra2 || $contra == null){

      $error =   "Les contrasenyes no són iguals/han de contenir alguna dada.";
      include '../Vista/registrar.vista.php';
          } else if(duplicatNOM($usuari) == $usuari || duplicatEMAIL($email) == $email){
        $error = "Valors duplicats";
        include '../Vista/registrar.vista.php';
      }
      else {
        try {
          $connexio_real = connexio();
          error_reporting(0);
          $contra = password_hash($contra, PASSWORD_BCRYPT);
          
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