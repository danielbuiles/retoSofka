<?php
require('../models/jugador.php');
require('../models/categoria.php');
require('../models/pregunta.php');
require('../database/database.php');

    session_start();
    $estado = $_SESSION['estado'];
    $jugador=$_SESSION['jugador'];
    $baseDatos=$_SESSION['baseDatos'];
    $categoria=$_SESSION['categoria'];
    $pregunta=$_SESSION['pregunta'];

    $jugador = unserialize($jugador);
    $baseDatos = unserialize($baseDatos);
    $categoria = unserialize($categoria);
    $pregunta = unserialize($pregunta);

    if ($estado != 'activo') {
        session_destroy();
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleJuego.css">
    <title>Juego del calamar</title>
</head>
<body>
    <div class="headerMenu">
        <p>Nick:<?php print($jugador->getNombre())?></p>
        <p>Categoria: <?php print($categoria->getNombre())?></p>
        <p>Puntos: <?php print($jugador->getPuntos())?></p>
        <p>Ronda: <?php print($jugador->getNumRonda())?></p>
        <p>dificultad: <?php print($categoria->getDificultad())?></p>
    </div>
    <form method="POST" action="../controllers/controller.php">
        <h3><?php print($pregunta->getPregunta())?></h3>
        <div>
            <input type="radio" id="op1" name="opcion" value="1">
            <label for="op1"><?php print($pregunta->getOpcion1())?></label>
        </div>
        <div>
            <input type="radio" id="op2" name="opcion" value="2">
            <label for="op2"><?php print($pregunta->getOpcion2())?></label>
        </div>
        <div>
            <input type="radio" id="op3" name="opcion" value="3">
            <label for="op3"><?php print($pregunta->getOpcion3())?></label>
        </div>
        <div>
            <input type="radio" id="op4" name="opcion" value="4">
            <label for="op4"><?php print($pregunta->getOpcion4())?></label>
        </div>
        <div class="btnContainer">
            <button name="btnRespuesta">validar</button>
            <button name="btnSalirJuego">salir</button>
        </div>
    </form>
</body>
</html>