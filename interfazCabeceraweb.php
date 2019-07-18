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
            <a href="inicio.php">Inicio</a> |
            <a href="ticketCrear.php">Crear Ticket</a> |
            <a href="gestionarticket.php">Gestionar Tickets</a> |
            <a href="listarticket.php">Listar Tickets</a> |
            <a href="usuariosalir.php">Salir</a> 
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