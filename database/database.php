<?php
    class Base_Datos
    {
        private $Usuario='root';
        private $password='';

        //se conecta con la base de datos
        public function Conexion_DB(){
            try 
            {
                $Datos='mysql:host=localhost;dbname=reto';
                $Conexion=new PDO($Datos,$this->Usuario,$this->password);
                return $Conexion;
            } 
            catch (PDOException $Error) 
            {
                echo($Error);
            }
        }

        //metodo para gurdar datos del jugador
        public function guardarDatos($ConsultaSQL){
            try 
            {
                $Base=$this->Conexion_DB();

                $Lanzar=$Base->prepare($ConsultaSQL);

                $ejecutor=$Lanzar->execute();
            } 
            catch (PDOException $Error) 
            {
                echo ($Error);
            }
        }

        //busca datos segun la consulta que se le pase como parametro
        public function buscarDatos($ConsultaSQL){
            try 
            {
                $Conectar=$this->Conexion_DB();

                $Preparo=$Conectar->prepare($ConsultaSQL);

                $Preparo->setFetchMode(PDO::FETCH_ASSOC);

                $Ejecucion=$Preparo->execute();

                return($Preparo->fetchAll());
            }
            catch (PDOException $Error) 
            {
                echo ($Error);
            }
        }
    }
?>