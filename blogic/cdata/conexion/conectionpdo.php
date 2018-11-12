<?php
    define("HOST", "sql173.main-hosting.eu."); 			
    define("USER", "u740561717_supe"); 			 
    define("PASSWORD", "12345678"); 	
    define("DATABASE", "u740561717_supe");
    
class Conexion extends PDO {
    private $tipo_de_base = 'mysql';
    private $host = HOST;
    private $nombre_de_base = DATABASE;
    private $usuario = USER;
    private $contraseña = PASSWORD;
    public $estado = '';

    public function __construct() {
        try {
            parent::__construct($this->tipo_de_base . ':host=' . $this->host . ';dbname=' . $this->nombre_de_base, $this->usuario, $this->contraseña, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
        } catch (PDOException $e) {
            $estado = False;
            exit;
        }
    }

}

?>