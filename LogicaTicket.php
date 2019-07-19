<?php
include_once './classTicket.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$datosTicket=filter_input_array(INPUT_POST);
$objTicket= new ticket($datosTicket);

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