<?php

define("KEY_TOKEN", "APR.wqc-354*");
define("MONEDA", "$");

class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct()
    {

        $this->host = 'localhost';
        $this->db = 'bdm_ci';
        $this->user = 'root';
        $this->password = 'mysqlpass';
        $this->charset = 'utf8mb4';

    }
    //CONTRASEÑAS DE MYSQL
    //$this->password = 'mysqlpass';
    //$this->password = 'Root';
    function connect(){

        try{

            $conn = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($conn, $this->user, $this->password);

            return $pdo;
        }catch(PDOException $e){

            print_r('Error de conexion: '.$e->getMessage());

        }

    }
}
?>