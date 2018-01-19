<?php

require ("conexion.php");

//Insert
$resultado = $db->query('INSERT INTO personas (nombre) VALUES ("José"),("Luís")');
echo "insert resultado $resultado";
//Delete
$resultado = $db->query('DELETE FROM personas WHERE id > ');
echo "delete resultado $resultado";
//Update
$resultado = $db->query('UPDATE personas SET activo=1 WHERE activo=0');
if ($registros){
    echo "Se han activado $db->affected_rows registros.";
}
echo "";