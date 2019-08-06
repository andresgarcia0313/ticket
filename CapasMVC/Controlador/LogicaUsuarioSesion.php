<?php
include_once 'classUsuario.php';
/**
 * @var Usuario Description:Almacena los datos de usuario
 */
$ObjUsuario = new Usuario(filter_input(INPUT_POST,'correo'),filter_input(INPUT_POST,'clave'));