<?php
// Definir la contraseña
$contrasena = "1234";

$hash = password_hash($contrasena, PASSWORD_BCRYPT);


if(password_verify($contrasena, $hash)){

    echo "correcto";

}else{

    echo "incorrecto";
}


?>