<?php 
// Benito Martinez Florido
session_start();
include '../Vista/inserirvista.php';
try {
    $dbname = 'pt03_benito_martinez';
    $username = 'root';
    $password = '';
    $connexio = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
    echo "Conectada correctamente";

    $email = "";
    $email = $_SESSION['email'];
    $usuari_id = "";
    $statement = $connexio->prepare("SELECT usuari_id FROM usuaris WHERE email = ?");
    $statement->bindParam(1,$email);
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $usuari_id = $row["usuari_id"];
    }




error_reporting(0);


// modificar
$article_nou = "";
$id_vell = "";
$article_nou = $_POST['article_nou']; 
$id_vell = $_POST['id_vell']; 
    $statement = $connexio->prepare("UPDATE articles SET article=? WHERE id=? AND usuari_id= ?");
    $statement->bindParam(1,$article_nou);
    $statement->bindParam(2,$id_vell);
    $statement->bindParam(3,$usuari_id);
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