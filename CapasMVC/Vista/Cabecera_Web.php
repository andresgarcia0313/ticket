<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="StyleSheet" href="CapasMVC/Vista/css/general.css" type="text/css">
        <title>Crear Ticket</title>
    </head>
    <body>
    <base href="http://localhost/ticket/" />
    <div>
        <nav>
            <a href="interfazInicio.php">Inicio</a> |
            <a href="interfazTicketCrear.php">Crear</a> |
            <a href="interfazInicio.php">Gestionar</a> |
            <a href="interfazTicketLista.php">Listar</a> |
            <a href="LogicaUsuarioSalir.php">Salir</a> 
        </nav>
    </div>
    <?php
    session_start();
    if (isset($_SESSION)) {
    }else{
        if ($_SERVER['REQUEST_URI'] != "/ticket/index.php") {
            header("location: ../../index.php");
        }
    }
    ?>