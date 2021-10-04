<?php
class Categoria
{
    private $nombre;
    private $dificultad;

    function __construct($nombre="",$dificultad="") {
        $this->nombre=$nombre;
        $this->dificultad=$dificultad;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getDificultad(){
        return $this->dificultad;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setDificultad($dificultad){
        $this->dificultad = $dificultad;
    }
}

?>