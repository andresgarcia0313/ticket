<?php
include_once '../Modelo/Usuario.php';
/**
 * @var Usuario Description:Almacena los datos de usuario
 */
$ObjUsuario = new Usuario(filter_input(INPUT_POST,'correo'),filter_input(INPUT_POST,'clave'));
echo "Alto";
/*
session_start();
$_SESSION['usuario'] = $this->correo;
header("location: interfazinicio.php");
} else {
echo "<center>Contraseña o Cuenta Incorrecta</center>";
if(isset($_SESSION)){
    session_destroy();
}
};*/