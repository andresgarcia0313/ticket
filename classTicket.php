<?php

include_once './classBaseDeDatos.php';

/**
 * Descripción de la clase
 * La presente clase tiene los atributos destinados para la creación de 
 * ticket con el solicitante que a futuro se distribuiran en otras tablas
 * debido que está versión tiene la funcionalidad minima de acuerdo a los 
 * objetivos de una rapida construcción
 * @category Ticket
 * @license http://www.andresgarcia.xyz
 * @copyright (c) 2019, Andrés Eduardo García Márquez 
 * @version 0.1
 * @since 2019 Julio
 * @author Andrés Eduardo García Márquez <andresgarcia0313@gmail.com>
 */
class ticket {

    /**
     * @var string <p>Almacena el nombre de la central o punto donde se 
     * encuentra el medidor</p> 
     */
    private $central;

    /**
     * @var string <p>Palabra que identifica a quién realiza la solicitud</p> 
     */
    private $nombresSolicitante;

    /**
     * @var string <p>Nombre de familia con que se distingue a la persona que 
     * realiza la solicitud</p> 
     */
    private $apellidosSolicitante;

    /**
     * @var int <p>Contiene el número asignado a la linea teléfonica de la 
     * central</p> 
     */
    private $telefonoFijo;

    /**
     * @var int <p>Contiene el número de la extensión asignado a cada teléfono 
     * dentro de la central</p> 
     */
    private $telefonoFijoExt;

    /**
     * @var int <p>Contiene el número asignado a la linea teléfonica del 
     * teléfono móvil</p> 
     */
    private $telefonoMovil;

    /**
     * @var string <p>Contiene el identificador del sistema 
     * de transmisión de mensajes por computadora a través de redes 
     * informáticas el cual ingresa el solicitante para comunicarse con el 
     * mismo</p> 
     */
    private $correo;

    /**
     * @var string <p>Contiene el identificado del Dispositivo de medición </p> 
     */
    private $medidor;

    /**
     * @var string <p>Registra el tipo de incidencia o solicitud</p> 
     */
    private $tipoTicket;

    /**
     * @var string <p>Almacena el resumen de la solicitud casí siendo un titulo 
     * unico</p> 
     */
    private $solicitud;

    /**
     * @var string <p>Almacena la información de la incidencia en detalle</p> 
     */
    private $incidencia;

    /**
     * Crea el objeto y llena sus atributos sin guardarlo en la base de datos
     * 
     * @param   array $datosTicket  Arreglo que contiene la información 
     * Del Tickete
     */
    public function __construct($datosTicket) {
        $this->central = $datosTicket['central'];
        $this->nombresSolicitante = $datosTicket['nombresSolicitante'];
        $this->apellidosSolicitante = $datosTicket['apellidosSolicitante'];
        $this->telefonoFijo = $datosTicket['telefonoFijo'];
        $this->telefonoFijoExt = $datosTicket['telefonoFijoExt'];
        $this->telefonoMovil = $datosTicket['telefonoMovil'];
        $this->correo = $datosTicket['correo'];
        $this->medidor = $datosTicket['medidor'];
        $this->tipoTicket = $datosTicket['tipoTicket'];
        $this->solicitud = $datosTicket['solicitud'];
        $this->incidencia = $datosTicket['incidencia'];
    }

    /**
     * Almacena en la base de datos los datos del objeto provisto por el 
     * contructor
     * 
     * @param void
     * @return void
     */
    public function guardar() {
        /**
         * Armar la consulta sql en variable
         * @param string $sql Realiza el armado de sql para la consulta guardar
         */
        $sql = "INSERT INTO ticket.ticket "
                . "(central, tipo_ticket, solicitud, descripsion, medidor, "
                . "estado, nombres, apellidos, telefono, ext, celular, correo) "
                . "VALUES"
                . "('$this->central', '$this->tipoTicket', '$this->solicitud', "
                . "'$this->incidencia', '$this->medidor', 'Abierto', "
                . "'$this->nombresSolicitante', '$this->apellidosSolicitante', "
                . "'$this->telefonoFijo', '$this->telefonoFijoExt', "
                . "'$this->telefonoMovil', '$this->correo');";
        $objdb = new BaseDeDatos($sql);
        header("location: interfazTicketLista.php");
    }

    public function leer($sql) {
        $objdb =new BaseDeDatos($sql);
        return $objdb->consultar($sql);
    }

}
