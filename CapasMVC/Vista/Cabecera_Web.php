<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="StyleSheet" href="css/general.css" type="text/css">
        <title>Crear Ticket</title>
    </head>
    <body>
    <base href="http://localhost/ticket/CapasMVC/Vista/" />
    <div>
        <nav>
            <a href="Casa.php">Inicio</a> |
            <a href="
               TicketCrear.php">Crear</a> |
            <!--<a href="interfazInicio.php">Gestionar</a> |-->
            <a href="TicketLista.php">Listar</a> <!--|
            <a href="CerrarSesion.php">Salir</a> -->
        </nav>
    </div>
    <?php
    session_start();
    if (isset($_SESSION)) {
        echo "Variable session està establecida";
        var_dump($_SESSION);
    }else{
        echo "Variable session NO està establecida";
        /*
        if ($_SERVER['REQUEST_URI'] != "/ticket/index.php") {
            header("location: ../../index.php");
        }
        */
        echo "Metodo de destruir sesión por finalizar";
        var_dump($_SESSION);
    }
    ?>

    /*
    solicita dev sec soliidario exo asp.net ind 
    3800000 indefinido 1 mes jornada libe seguro de vida sector solidario viculo dan segur de vehiculo corporativo
    andresgarcia0313@gmail.com
    Prueba tecnica
    
    */oficinas de global reporte en central de riesgos
    jennifer