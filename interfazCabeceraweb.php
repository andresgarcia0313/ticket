<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="StyleSheet" href="css/general.css" type="text/css">
        <title>Crear Ticket</title>
    </head>
    <body>
    <base href="http://localhost/ticket/" />
    <div>
        <nav>
            <a href="interfazInicio.php">Inicio</a> |
            <a href="interfazTicketCrear.php">Crear Ticket</a> |
            <a href="interfazInicio.php">Gestionar Tickets</a> |
            <a href="interfazInicio.php">Listar Tickets</a> |
            <a href="LogicaUsuarioSalir.php">Salir</a> 
        </nav>
    </div>
    <?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        if ($_SERVER['REQUEST_URI'] != "/ticket/index.php") {
            header("location: index.php");
        }
    }
    ?>