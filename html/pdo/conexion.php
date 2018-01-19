<?php

$opciones = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];

try {
    $db = new PDO('mysql:host=localhost;dbname=amazonAWS', 'root', 'Okonomiyaki1', $opciones);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}