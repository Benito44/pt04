<?php
          session_start();





function connexio(){
  $dbname = 'pt03_benito_martinez';
  $username = 'root';
  $password = '';
  $connexio = new PDO("mysql:host=localhost;dbname=$dbname",$username,$password);
return $connexio;
}
$email = $_POST['email'];
$contra = $_POST['contra'];

$connexio_real = connexio();
    $error = "";
     $statement = $connexio_real->prepare("SELECT * FROM usuaris WHERE email = ?");
    $statement->bindParam(1,$email);
    $statement->execute();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        if ($email == $row["email"] && $contra == $row["contrasenya"]){
          $_SESSION['email'] = $email;
          $_SESSION['contra'] = $contra;
          include 'index.logat.php';
        } else {
          $error = "No se ha pasado el email o la contrasenya correctamente";
          include  '../Vista/login.vista.php';
        }
    }




?>