<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuari</title>
    <link rel="stylesheet" type="text/css" href="../formulari.css">

</head>
<body>
    <h1>Registre</h1>
    <form action="../Controlador/registrar.php" id="form" method="post">
        Usuari
        <input type="text" id="usuari" name="usuari" placeholder="Usuari1" value="<?php if(isset($_POST['usuari']) && !(empty($error))) { echo ($_POST['usuari']);} ?>"><br><br>
        Email
        <input type="text"  id="email" name="email" placeholder="Usuari1@gmail.com" value="<?php if(isset($_POST['email']) && !(empty($error))) { echo ($_POST['email']);} ?>"><br><br>
        Contrasenya
        <input type="password" id="contra" name="contra" placeholder="Usuari1@1234" value="<?php if(isset($_POST['contra']) && !(empty($error))) { echo ($_POST['contra']);} ?>"><br><br>
        Torna a posar la contrasenya
        <input type="password" id="contra2" name="contra2" placeholder="Usuari1@1234" value="<?php if(isset($_POST['contra2']) && !(empty($error))) { echo ($_POST['contra2']);} ?>"><br><br>

        <input type="submit" value="Registrat">
        <a href="../Controlador/index.php">Torna</a>

        <span class="error">
		<?php if(!isset($error)){
		$error;
	        }else{echo $error;}?>
	</span> 
    </form>
    <form action="../Vista/login.vista.php" id="form" method="post"> 
        Ya t'has registrat? Logat aqui!!<br>
        <input type="submit" value="Login">
    </form>
    

</body>
</html>