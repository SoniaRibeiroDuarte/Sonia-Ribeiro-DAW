<?php
    //Array de nombres
   $a = array("Sara","Imanol","Dani","Antonio","David","Igor", "Naroa", "Christian", "Joseba", "Angel", "Alex", "Dumitru", "Mikel", "Ivan", "Martin");
   //Tomamos el valor del input procedente de la URL
   $nombre = $_REQUEST["nombre"];
   $sugerencia = "";
   if ($nombre!==""){
       //Pasamos el nombre a minúsculas
       $nombre = strtolower($nombre); 
       $long = strlen($nombre);

       foreach($a as $nom){//Cada elemento del array lo pasa a $nom en cada iteración
           //Si coincide la cadena pasada con los primeros caracteres de algún elemento del array
           if(stristr($nombre, substr($nom, 0, $long))){       
               if($sugerencia === ""){ //Si no hay texto en sugerencia
                   $sugerencia = $nom;
               }else{
                   $sugerencia = "$sugerencia, $nom";
               }
           }
       }
   }
   /*if ($sugerencia === "") echo "No hay sugerencias";
   else echo $sugerencia;*/
   echo ($sugerencia ==="") ? "No hay sugerencias" : $sugerencia;
?>

