<?php 
session_start();
/**
 * pagina
 *
 * @return void
 */
function pagina(){
    if (!isset($_GET['pagina'])) {
        $pagina_actual = 1;
    } else {
        $pagina_actual = $_GET['pagina'];
    }

    return $pagina_actual;
}
/**
 * paginacio
 *
 * @param  int $paginas
 * @param  int $pagina_actual
 * @return void
 */
function paginacio2($paginas, $pagina_actual){
    for ($x = 1; $x <= $paginas; $x++) { 
        echo '<li class="' . ($x == $pagina_actual ? "active" : "") . '"><a href="index.logat.php?pagina=' . $x . '">' . $x . '</a></li>';
        $nom_pagina = $x;
    }
    if ($pagina_actual != $nom_pagina) {
        $url = "index.logat.php?pagina=" . ($pagina_actual+1);
        echo "<li><a href=\"$url\">Seguent</a></li>\n";
    }else{
        echo '<li class="' . ("disabled") . '">Seguent</li>';
    }
    if($pagina_actual > 1){
        $url = "index.logat.php?pagina=" . ($pagina_actual-1);
        echo "<li><a href=\"$url\">Anterior</a></li>\n";
    }else{
        echo '<li class="' . ("disabled") . '">Anterior</li>';                   
    }
}

/**
 * mostrar_dades
 * @param  mixed $connexio
 * @param  mixed $pagina_actual
 * @return void
 */
function mostrar_dades2($connexio, $pagina_actual){
    $email = "";
    $email = $_SESSION['email'];
    $usuari_id = "";
    $statement = $connexio->prepare("SELECT usuari_id FROM usuaris WHERE email = ?");
    $statement->bindParam(1,$email);
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $usuari_id = $row["usuari_id"];
    }


    $statement = $connexio->prepare("SELECT * FROM articles WHERE usuari_id = ?");
    $statement->bindParam(1,$usuari_id);
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo '<li>' . $row["id"] . " - " . $row["article"] . '</li>';
    }
}

/**
 * cerrar_sesion
 * Destruye la sesión y redirige al usuario a index.php
 */
function cerrar_sessio() {
    session_start();
    session_destroy(); 
    header('Location: index.php'); // Redirigeix a l'usuari a la página de'nicio
    exit(); 
}

// Conexión a la base de datos	
try {
    $dbname = 'pt03_benito_martinez';
    $username = 'root';
    $password = '';
    $connexio = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
    echo "Conectada correctamente";

    $num_total_registros = $connexio->query("SELECT COUNT(*) FROM articles")->fetchColumn();
    $paginas = ceil(intval($num_total_registros) / intval(20));
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$pagina_actual = pagina();

require '../Vista/index.logat.vista.php';

?>