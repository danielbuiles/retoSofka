<?php
//se traen los modelos nesesarios
require('../models/jugador.php');
require('../models/categoria.php');
require('../models/pregunta.php');
require('../database/database.php');

//se instancian los objetos
$jugador =new Jugador();
$baseDatos=new Base_Datos();
$categoria =new Categoria();
$pregunta =new Pregunta();

//se inicializan los datos de jugador y se llama a la funcion principal para empezar el juego
if(isset($_POST['btnJugar'])){
    $nombreJugador = $_POST['nombre'];
    if ($nombreJugador=="") {
        $nombreJugador="player";
    }
    $jugador->setNombre($nombreJugador);

    juego(0,1);
}

//se verifica las respuestas del jugador
if (isset($_POST['btnRespuesta'])) {
    session_start();
    $jugador=$_SESSION['jugador'];
    $pregunta=$_SESSION['pregunta'];

    $jugador=unserialize($jugador);
    $pregunta = unserialize($pregunta);

    if ($_POST['opcion']==$pregunta->getOpcionCorrecta()) {
        
        //premios por cada ronda ganada
        if($jugador->getNumRonda()>=5){
            $puntos=$jugador->getPuntos()+1000;
            $rondas=$jugador->getNumRonda()+1;
            juego($puntos,$rondas);
        }
        else if($jugador->getNumRonda()==4){
            $puntos=$jugador->getPuntos()+500;
            $rondas=$jugador->getNumRonda()+1;
            juego($puntos,$rondas);
        }
        else if($jugador->getNumRonda()>=2){
            $puntos=$jugador->getPuntos()+200;
            $rondas=$jugador->getNumRonda()+1;
            juego($puntos,$rondas);
        }
        else{
            $puntos=$jugador->getPuntos()+100;
            $rondas=$jugador->getNumRonda()+1;
            juego($puntos,$rondas);
        }

        if($jugador->getNumRonda()==6){
            guardarDatos();
        }

    }else {
        guardarDatos();
    }
}

//si se retira del juego
if (isset($_POST['btnSalirJuego'])){
    guardarDatos();
}

//funcion principal para ejecutar el juego
function juego($puntos,$ronda){ 

    $GLOBALS['jugador']->setNumRonda($ronda);
    $GLOBALS['jugador']->setPuntos($puntos);

    //se busca la categoria segun la ronda en que este.
    $ronda=$GLOBALS['jugador']->getNumRonda();
    $categoriaDatos = $GLOBALS['baseDatos']->buscarDatos("SELECT id,nombre, dificultad FROM categoria WHERE id='$ronda'");

    //se envian los datos de la ronda nombre etc..
    $GLOBALS['categoria']->setNombre($categoriaDatos[0]['nombre']);
    $GLOBALS['categoria']->setDificultad($categoriaDatos[0]['dificultad']);

    //se busca las preguntas por el id de la categoria y se selecciona 1 al azar
    $idCategoria=$categoriaDatos[0]['id'];
    $preguntas=$GLOBALS['baseDatos']->buscarDatos("SELECT id,pregunta, opcion1, opcion2, opcion3, opcion4, opcionCorrecta FROM preguntas WHERE idCategoria='$idCategoria'");
    $random= rand(0,4);

    //se le envian los valores al modelo Pregunta
    $GLOBALS['pregunta']->setPregunta($preguntas[$random]['pregunta']);
    $GLOBALS['pregunta']->setOpcion1($preguntas[$random]['opcion1']);
    $GLOBALS['pregunta']->setOpcion2($preguntas[$random]['opcion2']);
    $GLOBALS['pregunta']->setOpcion3($preguntas[$random]['opcion3']);
    $GLOBALS['pregunta']->setOpcion4($preguntas[$random]['opcion4']);
    $GLOBALS['pregunta']->setOpcionCorrecta($preguntas[$random]['opcionCorrecta']);

    //se envian valores a las vistas a traves de sessiones
    session_start();
    $_SESSION['estado']="activo";
    $_SESSION['jugador']=serialize($GLOBALS['jugador']);
    $_SESSION['baseDatos']=serialize($GLOBALS['baseDatos']);
    $_SESSION['categoria']=serialize($GLOBALS['categoria']);
    $_SESSION['pregunta']=serialize($GLOBALS['pregunta']);

    //se redireciona a la vista del juego
    header('location:../views/juego.php');
}

//se guardan todos los datos del jugador, y se sale a la vista principal
function guardarDatos(){
    session_start();
    $jugador=$_SESSION['jugador'];
    $baseDatos=$_SESSION['baseDatos'];

    $baseDatos =unserialize($baseDatos);
    $jugador=unserialize($jugador);

    $nick=$jugador->getNombre();
    $premio=$jugador->getPuntos();
    $ronda=$jugador->getNumRonda();

    $consultaSQL="INSERT INTO datos(nick, puntos, ronda) VALUES ('$nick','$premio','$ronda')";
    $baseDatos->guardarDatos($consultaSQL);

    session_destroy();
    header('location:../index.html');
}

?>