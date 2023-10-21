<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section class="articles">
            <ul>
                <?php mostrar_dades2($connexio, $pagina_actual) ?>
            </ul>
        </section>

    <form method="post" action="../Controlador/modificar.php">
    Article2<input type="text"  id="article" name="article"><br>
    <input type="submit" value="insertar">
    <a href="../Controlador/index.logat.php">Torna</a>
    </form>
</body>
</html>