<?php 
// Benito Martinez Florido
session_start();
include_once '../Model/mainfunction.php';
$connexio = connexio();
try {

error_reporting(0);
$article = "";
$email = "";

$article = $_POST['article']; 
$email = $_SESSION['email'];

$usuari_id = "";
$usuari_id = usuari($email);


// Fem la secuencia per insertar els usuaris
$statement = $connexio->prepare("INSERT INTO articles (article, usuari_id) VALUES (?,?)");
 $statement->bindParam(1,$article);
$statement->bindParam(2,$usuari_id);

$nameError =  "Insertat correctament";
    $statement->execute();
    

}catch (Exception $e) {
    echo "Error:" .  $e->getMessage();
}
include '../Vista/inserirvista.php';

?>