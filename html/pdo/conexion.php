<?php
namespace App;
//conexion mediante PDO
$opciones = [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];
echo 'hola';

try {
    $db = new \PDO('mysql:host=localhost;dbname=cms', 'SoniaRibeiro', 'Okonomiyaki1', $opciones);
    $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    echo "ok";
} catch (\PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}