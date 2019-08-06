<?php

/**
 * Archivo de class o molde para los ticket
 *
 * Este archivo contrendra los atributos y metodos del ticket 
 *
 * PHP version 7
 *
 * LICENSE: Este archivo fuente está sujeto a la versión 0.01 de la licencia de 
 * Andres Eduardo Garcia Marquez que está disponible a través de Internet en el 
 * siguiente URL: http://www.andresgarcia.xyz Si no recibió una copia de la
 * licencia de Andres Eduardo Garcia Marquez y no puede obtenerla a través de 
 * la web, envíe una nota a andresgarcia0313@gmail.com para que podamos 
 * enviarle una copia.
 *
 * @category   Ticket
 * @package    Modelo
 * @author     Andres Eduardo Garcia Marquez <andresgarcia0313@gmail.com>
 * @copyright  2019 The Andres Eduardo Garcia Marquez Group
 * @license    http://www.andresgarcia.xyz Andres Garcia License 0.01
 * @version    GIT: $Id$
 * @link       http://www.andresgarcia.xyz
 * @see        Clase de base de datos
 * @since      Archivo disponible desde la versión 0.01
 * @deprecated File deprecated in Release 2.0.0
 */
/*
 * A continuaciòn incluir aquì, las constante define y $ _GLOBAL Asegúrese de 
 * que tengan los bloques de documentos apropiados para evitar que 
 * phpDocumentor cree que están documentados en el documento a nivel de página.
 */
require_once '../Modelo/BaseDeDatos.php';

/**
 * Corta descripsiòn para la clase: Gestiòn de informaciòn de tickets
 *
 * Larga descripsiòn para la clase: Gestiòn de informaciòn de tickets
 *
 * @category   Class
 * @package    Modelo
 * @author     Andres Eduardo Garcia Marquez <andresgarcia0313@gmail.com>
 * @copyright  2019 The Andres Eduardo Garcia Marquez Group
 * @license    http://www.andresgarcia.xyz Andres Garcia License 0.01
 * @version    Release: @package_version@
 * @link       http://www.andresgarcia.xyz
 * @see        Clase de base de datos
 * @since      Archivo disponible desde la versión 0.01
 * @deprecated File deprecated in Release 2.0.0
 */
class Ticket
{

    // {{{ properties
    /**
     * ID Es el identificador del ticket
     * 
     * @var integer <p>id del ticket</p> 
     */
    private $_id;

    /**
     * Central Del Medidor
     * 
     * @var string <p>Nombre de la _central donde está el _medidor</p> 
     */
    private $_central;

    /**
     * Nombre Persona Solicitante
     * 
     * @var string <p>Palabra que identifica a quién realiza la _solicitud</p> 
     */
    private $_nombresSolicitante;

    /**
     * Apellido Persona Solicitante
     * 
     * @var string <p>Nombre de familia con que se distingue a la persona que 
     * realiza la _solicitud</p> 
     */
    private $_apellidosSolicitante;

    /**
     * Telèfono
     * 
     * @var int <p>Contiene el número asignado a la linea teléfonica de la 
     * _central</p> 
     */
    private $_telefonoFijo;

    /**
     * Extensión del teléfono
     * 
     * @var int <p>Contiene el número de la extensión asignado a cada teléfono 
     * dentro de la _central</p> 
     */
    private $_telefonoFijoExt;

    /**
     * Celular
     * 
     * @var int <p>Contiene el número asignado a la linea teléfonica del 
     * teléfono móvil</p> 
     */
    private $_telefonoMovil;

    /**
     * Correo central
     * 
     * @var string <p>Contiene el identificador del sistema 
     * de transmisión de mensajes por computadora a través de redes 
     * informáticas el cual ingresa el solicitante para comunicarse con el 
     * mismo</p> 
     */
    private $_correo;

    /**
     * Identificador Medidor
     * 
     * @var string <p>Contiene el identificado del Dispositivo de medición </p> 
     */
    private $_medidor;

    /**
     * Tipo Solicitud
     * 
     * @var string <p>Registra el tipo de _incidencia o _solicitud</p> 
     */
    private $_tipoTicket;

    /**
     * Detalle de la solicitud
     * 
     * @var string <p>Almacena el resumen de la _solicitud casí siendo un titulo 
     * unico</p> 
     */
    private $_solicitud;

    /**
     * Detalle de incidencia
     * 
     * @var string <p>Almacena la información de la _incidencia en detalle</p> 
     */
    private $_incidencia;

    // }}}

    /**
     * Crea el objeto y llena sus atributos sin guardarlo en la base de datos
     * 
     * @param array $datosTicket Arreglo Con Datos Del Ticket
     */
    public function __construct($datosTicket = NULL)
    {
        $this->_central = $datosTicket['_central'];
        $this->_nombresSolicitante = $datosTicket['_nombresSolicitante'];
        $this->_apellidosSolicitante = $datosTicket['_apellidosSolicitante'];
        $this->_telefonoFijo = $datosTicket['_telefonoFijo'];
        $this->_telefonoFijoExt = $datosTicket['_telefonoFijoExt'];
        $this->_telefonoMovil = $datosTicket['_telefonoMovil'];
        $this->_correo = $datosTicket['_correo'];
        $this->_medidor = $datosTicket['_medidor'];
        $this->_tipoTicket = $datosTicket['_tipoTicket'];
        $this->_solicitud = $datosTicket['_solicitud'];
        $this->_incidencia = $datosTicket['_incidencia'];
    }

    /**
     * Obtener Variable Del Objeto
     * 
     * @return integer
     */
    function get_id()
    {
        return $this->_id;
    }

    /**
     * Obtener Variable Del Objeto
     * 
     * @return string
     */
    function get_central()
    {
        return $this->_central;
    }

    /**
     * Obtener Variable Del Objeto
     * 
     * @return type
     */
    function get_nombresSolicitante()
    {
        return $this->_nombresSolicitante;
    }

    /**
     * Obtener Variable Del Objeto
     * 
     * @return type
     */
    function get_apellidosSolicitante()
    {
        return $this->_apellidosSolicitante;
    }

    /**
     * Obtener Variable Del Objeto
     * 
     * @return type
     */
    function get_telefonoFijo()
    {
        return $this->_telefonoFijo;
    }

    /**
     * Obtener Variable Del Objeto
     * 
     * @return type
     */
    function get_telefonoFijoExt()
    {
        return $this->_telefonoFijoExt;
    }

    /**
     * Obtener Variable Del Objeto
     * 
     * @return type
     */
    function get_telefonoMovil()
    {
        return $this->_telefonoMovil;
    }

    /**
     * Obtener Variable Del Objeto
     * 
     * @return type
     */
    function get_correo()
    {
        return $this->_correo;
    }

    /**
     * Obtener Variable Del Objeto
     * 
     * @return type
     */
    function get_medidor()
    {
        return $this->_medidor;
    }

    /**
     * Obtener Variable Del Objeto
     * 
     * @return type
     */
    function get_tipoTicket()
    {
        return $this->_tipoTicket;
    }

    /**
     * Obtener Variable Del Objeto
     * 
     * @return type
     */
    function get_solicitud()
    {
        return $this->_solicitud;
    }

    /**
     * Obtener Variable Del Objeto
     * 
     * @return type
     */
    function get_incidencia()
    {
        return $this->_incidencia;
    }

    /**
     * Establecer Variable Del Objeto
     * 
     * @param type $_id
     */
    function set_id($_id)
    {
        $this->_id = $_id;
    }

    /**
     * Establecer Variable Del Objeto
     * 
     * @param type $_central
     */
    function set_central($_central)
    {
        $this->_central = $_central;
    }

    /**
     * Establecer Variable Del Objeto
     * 
     * @param type $_nombresSolicitante
     */
    function set_nombresSolicitante($_nombresSolicitante)
    {
        $this->_nombresSolicitante = $_nombresSolicitante;
    }

    /**
     * Establecer Variable Del Objeto
     * 
     * @param type $_apellidosSolicitante
     */
    function set_apellidosSolicitante($_apellidosSolicitante)
    {
        $this->_apellidosSolicitante = $_apellidosSolicitante;
    }

    /**
     * Establecer Variable Del Objeto
     * 
     * @param type $_telefonoFijo
     */
    function set_telefonoFijo($_telefonoFijo)
    {
        $this->_telefonoFijo = $_telefonoFijo;
    }

    /**
     * Establecer Variable Del Objeto
     * 
     * @param type $_telefonoFijoExt
     */
    function set_telefonoFijoExt($_telefonoFijoExt)
    {
        $this->_telefonoFijoExt = $_telefonoFijoExt;
    }

    /**
     * Establecer Variable Del Objeto
     * 
     * @param type $_telefonoMovil
     */
    function set_telefonoMovil($_telefonoMovil)
    {
        $this->_telefonoMovil = $_telefonoMovil;
    }

    /**
     * Establecer Variable Del Objeto
     * 
     * @param type $_correo
     */
    function set_correo($_correo)
    {
        $this->_correo = $_correo;
    }

    /**
     * Establecer Variable Del Objeto
     * 
     * @param type $_medidor
     */
    function set_medidor($_medidor)
    {
        $this->_medidor = $_medidor;
    }

    /**
     * Establecer Variable Del Objeto
     * 
     * @param type $_tipoTicket
     */
    function set_tipoTicket($_tipoTicket)
    {
        $this->_tipoTicket = $_tipoTicket;
    }

    /**
     * Establecer Variable Del Objeto
     * 
     * @param type $_solicitud
     */
    function set_solicitud($_solicitud)
    {
        $this->_solicitud = $_solicitud;
    }

    /**
     * Establecer Variable Del Objeto
     * 
     * @param type $_incidencia
     */
    function set_incidencia($_incidencia)
    {
        $this->_incidencia = $_incidencia;
    }

    /**
     * Almacena en la base de datos los datos del objeto provisto por el 
     * contructor
     * 
     * @return void
     */
    public function guardar()
    {
        /**
         * Armar la consulta sql en variable
         * 
         * @param string $sql Realiza el armado de sql para la consulta guardar
         */
        $sql = "INSERT INTO ticket.ticket "
                . "(_central, tipo_ticket, _solicitud, descripsion, _medidor, "
                . "estado, nombres, apellidos, telefono, ext, celular, _correo) "
                . "VALUES"
                . "('$this->_central', '$this->_tipoTicket', '$this->_solicitud', "
                . "'$this->_incidencia', '$this->_medidor', 'Abierto', "
                . "'$this->_nombresSolicitante', '$this->_apellidosSolicitante', "
                . "'$this->_telefonoFijo', '$this->_telefonoFijoExt', "
                . "'$this->_telefonoMovil', '$this->_correo');";
        $objdb = new BaseDeDatos($sql);
        unset($objdb);
        header("location: interfazTicketLista.php");
    }

    /**
     * Leer la informaciòn del ticket
     * 
     * @param string $sql Consulta en formato sql
     * 
     * @return array 
     */
    public function leer($sql)
    {
        $objdb = new BaseDeDatos($sql);
        return $objdb->consultar($sql);
    }

    /**
     * Cierra el ticke creando la fecha de cierre en el registro
     * 
     * @param type $id
     */
    public function cerrarTicket($id)
    {
        $sql = "UPDATE ticket SET cierre=now() where id=" . $id . ";";
        echo $sql;
        $objdb = new BaseDeDatos($sql);
        return $objdb->query($sql);
    }

}

/*
 * Test ejecución cerrarTicket
echo "Hola Mundo<p>";
$objTicket = new Ticket();
$objTicket->cerrarTicket(11);
*/