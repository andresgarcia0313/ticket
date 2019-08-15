<?php
include_once '../Modelo/Usuario.php';
$correo=filter_input(INPUT_POST,'correo');
$clave=filter_input(INPUT_POST,'clave');
$ObjUsuarioModelo = new Usuario($correo, $clave);
if ($ObjUsuarioModelo->existe()){
    session_start();
    $_SESSION['correo']=$correo;
    header("location: ../Vista/Casa.php");
    
}else{
    echo "<div><center>Contraseña o Cuenta Incorrecta Por favor Intente Nuevamente</center></div>";
    include_once '../Vista/Pie_De_Pagina.php';
    if(isset($_SESSION)){
        session_destroy();
    }
}
