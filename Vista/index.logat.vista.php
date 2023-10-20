
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

        <form action="../Vista/inserirvista.php" id="form" method="post"> 
        Insertar<br>
        <input type="submit" value="Insertar">
        </form>

        <form action="login.vista.php" id="form" method="post"> 
        Modificar<br>
            <input type="submit" value="Modificar">
        </form>

        <form action="login.vista.php" id="form" method="post"> 
        Eliminar<br>
            <input type="submit" value="Eliminar">
        </form>
        </div>
</body>
</html>