<?php

class Database{
    private const nombre_bd = "gestion_ccai";
    private const usuario = "root";
    private const password = "";
    private const url = "localhost";
    private $mysql;

    public function __construct(){
        $this->mysql = new mysqli($this::url, $this::usuario, $this::password, $this::nombre_bd, 3308);
        if($this->mysql->connect_errno){
            echo "No se pudo conectar con la Base de Datos ".$this->mysql->connect_errno;
            exit();
        }
    }

    public function actualizar($consulta){
	$this->mysql->query("SET NAMES utf8");
        $resultado = $this->mysql->query($consulta);
        return $this->mysql->affected_rows;
    }
    public function insertar($consulta){
	$this->mysql->query("SET NAMES utf8");
        $resultado = $this->mysql->query($consulta);
        return $this->mysql->affected_rows;
    }
    public function insertar_id($consulta){
	$this->mysql->query("SET NAMES utf8");
        $resultado = $this->mysql->query($consulta);
        return $this->mysql->insert_id;
    }

    public function seleccionar($consulta){
	$this->mysql->query("SET NAMES utf8");
        $resultado = $this->mysql->query($consulta);
        $registros = array();
        $resultado = $this->convertirUTF8($resultado);
        while($renglon = $resultado->fetch_object()){
            array_push($registros, $renglon);
        }
        $resultado->free();
        return $registros;
    }
    public function error(){
        return $this->mysql->error;
    }
    
    private function convertirUTF8($array){
        array_walk_recursive($array, function(&$item, $key){
            if(!mb_detect_encoding($item, "utf-8", true)){
                $item = utf8_decode($item);
            }
        });
        return $array;
    }
}<?php

class Database{
    private const nombre_bd = "gestionccai";
    private const usuario = "root";
    private const password = "";
    private const url = "localhost";
    private $mysql;

    public function __construct(){
        $this->mysql = new mysqli($this::url, $this::usuario, $this::password, $this::nombre_bd, 3306);
        if($this->mysql->connect_errno){
            echo "No se pudo conectar con la Base de Datos ".$this->mysql->connect_errno;
            exit();
        }
    }

    public function actualizar($consulta){
	$this->mysql->query("SET NAMES utf8");
        $resultado = $this->mysql->query($consulta);
        return $this->mysql->affected_rows;
    }
    public function insertar($consulta){
	$this->mysql->query("SET NAMES utf8");
        $resultado = $this->mysql->query($consulta);
        return $this->mysql->affected_rows;
    }
    public function insertar_id($consulta){
	$this->mysql->query("SET NAMES utf8");
        $resultado = $this->mysql->query($consulta);
        return $this->mysql->insert_id;
    }

    public function seleccionar($consulta){
	$this->mysql->query("SET NAMES utf8");
        $resultado = $this->mysql->query($consulta);
        $registros = array();
        $resultado = $this->convertirUTF8($resultado);
        while($renglon = $resultado->fetch_object()){
            array_push($registros, $renglon);
        }
        $resultado->free();
        return $registros;
    }
    public function error(){
        return $this->mysql->error;
    }
    
    private function convertirUTF8($array){
        array_walk_recursive($array, function(&$item, $key){
            if(!mb_detect_encoding($item, "utf-8", true)){
                $item = utf8_decode($item);
            }
        });
        return $array;
    }
}