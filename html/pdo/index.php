<?php

require ("conexion.php");

//Insert
$registros = $db->exec('INSERT INTO personas (nombre) VALUES ("José"),("Luís")');
if ($registros){
    echo "Se han insertado $registros registros.<br>";
}
//Delete
$registros = $db->exec('DELETE FROM personas WHERE id>3');
if ($registros){
    echo "Se han borrado $registros registros.<br>";
}

//Update
$registros = $db->exec('UPDATE personas SET activo=1 WHERE activo=0');
if ($registros){
    echo "Se han actualizado $registros registros.<br>";
}else{
    echo "No hay campos que actualizar.<br><br>";
}


//Select con BOTH
$resultado = $db->query('SELECT * FROM personas');
while ($personas = $resultado->fetch()){ //O bien ($resultado->fetch(PDO::FETCH_BOTH)
    echo $personas['id']." ".$personas[1]." ".$personas['activo']."<br>";
}
echo "<br>";
//Select con ASSOC
$resultado = $db->query('SELECT * FROM personas');
while ($personas = $resultado->fetch(PDO::FETCH_ASSOC)){ //Recorro el resultado
    echo $personas['id']." ".$personas['nombre']." ".$personas['activo']."<br>";
}
echo "<br>";
//Select con NUM
$resultado = $db->query('SELECT * FROM personas');
while ($personas = $resultado->fetch(PDO::FETCH_NUM)){ //Recorro el resultado
    echo $personas[0]." ".$personas[1]." ".$personas[2]."<br>";
}
echo "<br>";
//Select con OBJ
$resultado = $db->query('SELECT * FROM personas');
while ($personas = $resultado->fetch(PDO::FETCH_OBJ)){ //Recorro el resultado
    echo $personas->id." ".$personas->nombre." ".$personas->activo."<br>";
}
echo "<br>";
//Select con LAZY
$resultado = $db->query('SELECT * FROM personas');
while ($personas = $resultado->fetch(PDO::FETCH_LAZY)){ //Recorro el resultado
    echo $personas[0]." ".$personas['nombre']." ".$personas->activo."<br>";
}
echo "<br>";
//Select con BOUND
$resultado = $db->query('SELECT * FROM personas');
$resultado->bindColumn(1, $id);
$resultado->bindColumn(2, $nombre);
$resultado->bindColumn(3, $activo);
while ($personas = $resultado->fetch(PDO::FETCH_BOUND)){ 

//Recorro el resultado
    echo $id." ".$nombre." ".$activo."<br>";
}