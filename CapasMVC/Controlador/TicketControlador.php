<?php 

/*
 * Copyright 2019 agarcia220.
 *
 * Licencia propietaria(the "License");
 * No puede usar este archivo, excepto cumplimiento con la licencia
 * Puede obtener una copia de la licencia en
 *
 *      http://www.andresgarcia.xyz
 *
 * A menos que sea requerido por la ley aplicable o acordado por escrito, software
 * distribuido bajo la licencia se distribuye "TALCUAL",
 * SIN GARANTÍAS O CONDICIONES DE NINGÚN TIPO, expresas o implícitas.
 * Consulte la Licencia para el idioma específico que rige los permisos y 
 * las limitaciones de la Licencia
 * Todos los derechos reservados ©
 * www.andresgarcia.xyz
 */
include_once 'Controlador.php';
include_once '../Modelo/Ticket.php';
/**
 * Description of Ticket
 * Controlador y contenedor de la lògica sobre los ticketes
 * 
 * @author agarcia220
 */
class TicketControlador extends Controlador
{
    public function tablaHtml()
    {
        parent::crearTablaHtml('ticket');
    }
    public function guardar(){
        
    }
}
