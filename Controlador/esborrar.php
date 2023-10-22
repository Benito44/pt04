<?php 
// Benito Martinez Florido
session_start();
include_once '../Model/mainfunction.php';
include '../Vista/inserirvista.php';
$connexio = connexio();
try {
    $email = "";
    $email = $_SESSION['email'];
    $usuari_id = "";
    $usuari_id = usuari($email);




error_reporting(0);


// modificar

    $id = "";
    $id = $_POST['id']; 
    $statement = $connexio->prepare("DELETE FROM articles WHERE id = ? AND usuari_id = ?");
    $statement->bindParam(1,$id);
    $statement->bindParam(2,$usuari_id);
    $statement->execute();

    $statement = $connexio->prepare("SELECT * FROM articles WHERE usuari_id = ?");
    $statement->bindParam(1,$usuari_id);
    $statement->execute();
    echo '<section><ul>';
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo '<li>' . $row["id"] . " - " . $row["article"] . '</li>';
}
echo '</ul></section>';


} catch (Exception $e) {
    echo "Error:" .  $e->getMessage();
}


?>