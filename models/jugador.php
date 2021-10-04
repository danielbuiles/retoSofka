<?php
class Jugador
{
    private $nombre;
    private $puntos;
    private $numRonda;

    function __construct($nombre="",$puntos="",$numRonda="") {
        $this->nombre=$nombre;
        $this->puntos=$puntos;
        $this->numRonda=$numRonda;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getPuntos(){
        return $this->puntos;
    }
    public function setPuntos($puntos){
        $this->puntos = $puntos;
    }

    public function getNumRonda(){
        return $this->numRonda;
    }
    public function setNumRonda($numRonda){
        $this->numRonda = $numRonda;
    }
}


?>