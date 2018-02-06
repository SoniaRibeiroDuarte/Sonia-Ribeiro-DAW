<?php
error_reporting(0);

$objeto = "";
$objeto->nombre ="sonia";
$objeto->nacimiento ="1815";
$objeto->pais ="España";
$objeto->edad ="21";

$miJSON = json_encode($obejeto);
echo $miJSON ;


