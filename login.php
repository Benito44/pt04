<?php


$email = $_POST['email'];
$contra = $_POST['contra'];

$error = "";
function connexio(){
  $dbname = 'pt04_benito_martinez';
  $username = 'root';
  $password = '';
  $connexio = new PDO("mysql:host=localhost;dbname=$dbname",$username,$password);
return $connexio;
}

function mostrar_insertar($email,$contra){
    $connexio_real = connexio();
    $statement = $connexio_real->prepare("SELECT email,contrasenya FROM usuaris WHERE email = ?");
    $statement->bindParam(1,$email);
    $statement->execute();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>' . $row["dni"] . '</td>';
        echo '<td>' . $row["nom"] . '</td>';
        echo '<td>' . $row["adreca"] . '</td>';
        echo '</tr>';
        if($email == $row["email"]){
            session_start();
            $error = "S'ha trobat el ";
        }
    }
    }

      include 'registrar.vista.php';





?>