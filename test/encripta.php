<?php
// Las claves son: CHINCHA ID(1) - SENATI (2)
$clave = "casa";
$claveEncriptada = password_hash($clave, PASSWORD_BCRYPT);
var_dump($claveEncriptada);


$claveIngresada = "casa";

//password_verify(): boolean
//if (password_verify($claveIngresada, $claveEncriptada)){
  //  echo "Contraseña correcta";
//}else{
  //  echo "Contraseña incorrecta";
//}
