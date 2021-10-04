<?php
require('../database/database.php');

$baseDatos=new Base_Datos();
$historialJuego=$baseDatos->buscarDatos("SELECT * FROM datos WHERE 1");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <scroll-container>
        <?php  foreach ($historialJuego as $historial): ?>
        <scroll-page id="page-1">
            id:<?php print($historial['id'])?>
            <br>
            nick:<?php print($historial['nick'])?>
            <br>
            puntos:<?php print($historial['puntos'])?>
            <br>
            ronda:<?php print(($historial['ronda']==6)?"completadas":$historial['ronda'])?>
            <br>
            -----------------------------------------------------
        </scroll-page>
        <?php endforeach; ?>
    </scroll-container>
    <button><a href="../index.html">Regresar</a></button>
</body>
</html>

<style>

@import url('https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap');
body{
    font-family: 'Lato', sans-serif;
    height:100vh;
    background: #B2BCD2;
}

scroll-container {
  display: block;
  margin: 0 auto;
  text-align: center;
  border: 2px solid #ccc;
}
scroll-container {
  display: block;
  width: 50%;
  height: 80%;
  overflow-y: scroll;
  scroll-behavior: smooth;
  flex-direction: column-reverse;
}
scroll-page {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 30%;
  font-size: 2em;
}

button{
  font-size:40px;
  position: absolute;
  border-radius: 10px;
  bottom: 0;
  background: #C7E8A2;
}
a{
  text-decoration: none;
  color: #000;
}
</style>