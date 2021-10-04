<?php
class Pregunta extends Categoria
{
    private $pregunta;
    private $opcion1;
    private $opcion2;
    private $opcion3;
    private $opcion4;
    private $opcionCorrecta;

    function __construct($pregunta="",$opcion1="",$opcion2="",$opcion3="",$opcion4="",$opcionCorrecta="") {
        $this->pregunta = $pregunta;
        $this->opcion1 = $opcion1;
        $this->opcion2 = $opcion2;
        $this->opcion3 = $opcion3;
        $this->opcion4 = $opcion4;
        $this->opcionCorrecta = $opcionCorrecta;
    }

    public function getPregunta() {
        return $this->pregunta;
    }

    public function setPregunta($pregunta){
        $this->pregunta = $pregunta;
    }

    public function getOpcion1(){
        return $this->opcion1;
    }

    public function setOpcion1($opcion1){
        $this->opcion1 = $opcion1;
    }

    public function getOpcion2(){
        return $this->opcion2;
    }

    public function setOpcion2($opcion2){
        $this->opcion2 = $opcion2;
    }

    public function getOpcion3(){
        return $this->opcion3;
    }

    public function setOpcion3($opcion3){
        $this->opcion3 = $opcion3;
    }

    public function getOpcion4(){
        return $this->opcion4;
    }

    public function setOpcion4($opcion4){
        $this->opcion4 = $opcion4;
    }

    public function getOpcionCorrecta(){
        return $this->opcionCorrecta;
    }

    public function setOpcionCorrecta($opcionCorrecta){
        $this->opcionCorrecta = $opcionCorrecta;
    }
}

?>