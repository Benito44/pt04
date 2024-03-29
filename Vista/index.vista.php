
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="../estils.css">
    <title>Paginación</title>
</head>
<body>
    <form action="../Vista/registrar.vista.php" method="post">
    <input type="submit" value="Registrar-se">

    </form>
    <form action="../Vista/login.vista.php" method="post">
    <input type="submit" value="Login">
    </form>
    <div class="contenidor">
    <form method="GET" action="../Controlador/index.php">
    <label for="opcions">Articles per pàgina:</label>
    <!-- Al fer qualsevol canvi en la sel·lecció de producte per pàgina enviarà les dades -->
	<select id="opcions" name="opcions" onchange="this.form.submit()">
    <!-- Quan es sel·leccioni el número és mostrarà per pantalla -->
        <option value="5" <?php if ($productes == 5) echo 'selected'; ?>>5</option>
        <option value="10" <?php if ($productes == 10) echo 'selected'; ?>>10</option>
        <option value="15" <?php if ($productes == 15) echo 'selected'; ?>>15</option>
    </select>
</form>

        <section class="articles">
            <ul>
                <?php mostrar_dades($connexio, $pagina_actual) ?>
            </ul>
        </section>

        <section class="paginacio">
            <ul >
                <?php paginacio($paginas, $pagina_actual) ?>
            </ul>
        </section>
    </div>
</body>
</html>