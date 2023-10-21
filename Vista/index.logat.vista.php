
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="../estils.css"> <!-- Hacer referencia a tu archivo de estilos -->
    <title>Paginación</title>
</head>
<body>
    <div class="contenidor">
        <h1>Articles</h1>
        
        <section class="articles">
            <ul>
                <?php mostrar_dades2($connexio, $pagina_actual) ?>
            </ul>
        </section>

        <section class="paginacio">
            <ul >
                <?php paginacio2($paginas, $pagina_actual) ?>
            </ul>
        </section>
        <a href="../Controlador/cerrar_session.php">Cerrar sesión</a>
        <form action="modificar.php" id="form" method="post"> 
        <h1>Insertar</h1>
        Insertar article <br>
        <input type="text"  id="article" name="article"><br>
        <input type="submit" value="insertar">
        </form>


        </div>
</body>
</html>