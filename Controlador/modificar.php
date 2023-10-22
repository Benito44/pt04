<?php 
// Benito Martinez Florido
session_start();
include '../Vista/inserirvista.php';
include_once '../Model/mainfunction.php';
$connexio = connexio();
try {

    $email = "";
    $email = $_SESSION['email'];
    $usuari_id = "";
    $usuari_id = usuari($email);



error_reporting(0);

$article = null;
$article = $_POST['article'];

// insertar
if ($article != null) {
    $existingArticleQuery = $connexio->prepare("SELECT COUNT(*) FROM articles WHERE article = ? AND usuari_id = ?");
    $existingArticleQuery->bindParam(1, $article);
    $existingArticleQuery->bindParam(2, $usuari_id);
    $existingArticleQuery->execute();
    $existingArticleCount = $existingArticleQuery->fetchColumn();

    if ($existingArticleCount == 0) {
        // El artículo no existe, así que lo insertamos
        $insertStatement = $connexio->prepare("INSERT INTO articles (article, usuari_id) VALUES (?, ?)");
        $insertStatement->bindParam(1, $article);
        $insertStatement->bindParam(2, $usuari_id);
        $insertStatement->execute();
        $_POST['article'] = null;
    } else {
        // El artículo ya existe, puedes mostrar un mensaje de error o tomar otra acción.
        echo "El artículo ja existeix.";
    }
}
$statement = $connexio->prepare("SELECT * FROM articles WHERE usuari_id = ?");
$statement->bindParam(1,$usuari_id);
$statement->execute();
echo '<section><ul>';
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo '<li>' . $row["id"] . " - " . $row["article"] . '</li>';
}
echo '</ul></section>';
}catch (Exception $e) {
    echo "Error:" .  $e->getMessage();
}


?>