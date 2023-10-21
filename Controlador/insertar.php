<?php 
// Benito Martinez Florido
session_start();
try {
    $dbname = 'pt03_benito_martinez';
    $username = 'root';
    $password = '';
    $connexio = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
    echo "Conectada correctamente";

error_reporting(0);
$article = "";
$email = "";

$article = $_POST['article']; 
$email = $_SESSION['email'];

$usuari_id = "";
$statement = $connexio->prepare("SELECT usuari_id FROM usuaris WHERE email = ?");
$statement->bindParam(1,$email);
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $usuari_id = $row["usuari_id"];
}


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