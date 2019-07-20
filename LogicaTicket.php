<?php
include_once './classTicket.php';

$datosFormulario=filter_input_array(INPUT_POST);
/**
 * @var ticket $objTicket Arreglo el cual se crea con todos los datos del 
 * formulario de interfazTicketCrear.php
 */
$objTicket= new ticket($datosFormulario);
$objTicket->guardar();

/*
 *
 * Se dejan a continuación los datos a manejar
 *  Array
(
    [central] => TEQUENDAMA
    [nombresSolicitante] => Andrés Eduardo
    [apellidosSolicitante] => Márquez
    [telefonoFijo] => 012456984
    [telefonoFijoExt] => 123
    [telefonoMovil] => 3012456984
    [correo] => andresgarcia0313@gmail.com
    [medidor] => vsdf-1231
    [tipoTicket] => Otro
    [solicitud] => validar solicitud
    [incidencia] => esta es la descripción de la incidencia
    [archivo] => 
    [enviar] => Enviar
)
 */