<?php
namespace App\Helper;


class DbHelper {
    
    var $db;
    
    function __construct() {
        //conexion mediante PDO
        $opciones = [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];

        try {
            $this->db = new \PDO('mysql:host=localhost;dbname=cms', 'SoniaRibeiro', 'Okonomiyaki1', $opciones);
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        };
    }
}
