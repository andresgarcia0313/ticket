<?php

/**
 * Breve descripción Para El Archivo: Clase modelo de ticket
 *
 * Descripción larga para el archivo :Este archivo contendrá los atributos y 
 * métodos del ticket 
 *
 * PHP version 7
 *
 * LICENSE: Este archivo fuente está sujeto a la versión 0.01 de la licencia de 
 * Andrés Eduardo García Márquez que está disponible a través de Internet en el 
 * siguiente URL: http://www.andresgarcia.xyz Si no recibió una copia de la
 * licencia de Andrés Eduardo García Márquez y no puede obtenerla a través de 
 * la web, envíe una nota a andresgarcia0313@gmail.com para que podamos 
 * enviarle una copia.
 *
 * @category   Ticket
 * @package    Modelo
 * @author     Andres Eduardo Garcia Marquez <andresgarcia0313@gmail.com>
 * @copyright  2019 Grupo Andrés Eduardo García Márquez
 * @license    http://www.andresgarcia.xyz Andrés García licencia 0.01
 * @version    GIT: $Id$
 * @link       http://www.andresgarcia.xyz
 * @see        Clase de base de datos
 * @since      Archivo disponible desde la versión 0.01
 * @deprecated Archivo en desuso en versión 2.0.0
 */
/*
 * A continuaciòn incluir aquì, las constante define y $ _GLOBAL Asegúrese de 
 * que tengan los bloques de documentos apropiados para evitar que 
 * phpDocumentor cree que están documentados en el documento a nivel de página.
 */
require_once '../Modelo/BaseDeDatos.php';

/**
 * Corta descripción para la clase: gestión de información de ticket's
 *
 * Larga descripción para la clase: gestión de información de ticket's
 *
 * @category   Clases
 * @package    Modelo
 * @author     Andres Eduardo Garcia Marquez <andresgarcia0313@gmail.com>
 * @copyright  2019 El grupo Andrés Eduardo García Márquez
 * @license    http://www.andresgarcia.xyz Andrés García licencia 0.01
 * @version    Release: @package_version@
 * @link       http://www.andresgarcia.xyz
 * @see        Clase de base de datos
 * @since      Archivo disponible desde la versión 0.01
 * @deprecated Clase en desuso en versión 2.0.0
 */
class Ticket
{

    // {{{ properties
    /**
     * ID Es el identificador del ticket
     * 
     * @var int <p>id del ticket</p> 
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
    public function __construct($datosTicket = null)
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
     * Leer la información del ticket
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
     * Cerrar el boleto de soporte almacena el momento de solicitud de cierre
     * 
     * @param int $id Identificador numérico del boleto de soporte.
     * 
     * @return boolean Resultado de la modificación.
     */
    public function cerrarTicket($id)
    {
        $sql = "UPDATE ticket SET cierre=now() where id=" . $id . ";";
        echo $sql;
        $objdb = new BaseDeDatos($sql);
        return $objdb->query($sql);
    }

    /**
     * Obtiene la propiedad
     * 
     * @return string
     */
    function getId()
    {
        return $this->_id;
    }

    /**
     * Obtiene la propiedad
     * 
     * @return string
     */
    function getCentral()
    {
        return $this->_central;
    }

    /**
     * Obtiene la propiedad
     * 
     * @return string
     */
    function getNombresSolicitante()
    {
        return $this->_nombresSolicitante;
    }

    /**
     * Obtiene la propiedad
     * 
     * @return string
     */
    function getApellidosSolicitante()
    {
        return $this->_apellidosSolicitante;
    }

    /**
     * Obtiene la propiedad
     * 
     * @return int
     */
    function getTelefonoFijo()
    {
        return $this->_telefonoFijo;
    }

    /**
     * Obtiene la propiedad
     * 
     * @return int
     */
    function getTelefonoFijoExt()
    {
        return $this->_telefonoFijoExt;
    }

    /**
     * Obtiene la propiedad
     * 
     * @return int
     */
    function getTelefonoMovil()
    {
        return $this->_telefonoMovil;
    }

    /**
     * Obtiene la propiedad
     * 
     * @return string
     */
    function getCorreo()
    {
        return $this->_correo;
    }

    /**
     * Obtiene la propiedad
     * 
     * @return string
     */
    function getMedidor()
    {
        return $this->_medidor;
    }

    /**
     * Obtiene la propiedad
     * 
     * @return string
     */
    function getTipoTicket()
    {
        return $this->_tipoTicket;
    }

    /**
     * Obtiene la propiedad
     * 
     * @return string
     */
    function getSolicitud()
    {
        return $this->_solicitud;
    }

    /**
     * Obtiene la propiedad
     * 
     * @return string
     */
    function getIncidencia()
    {
        return $this->_incidencia;
    }

    /**
     * Establece el identificador del boleto de soporte
     * 
     * @param int $id Establece el identificador del boleto de soporte
     * 
     * @return void
     */
    function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * Establece la propiedad
     * 
     * @param string $central Propiedad
     * 
     * @return void
     */
    function setCentral($central)
    {
        $this->_central = $central;
    }

    /**
     * Establece la propiedad
     * 
     * @param string $nombresSolicitante Propiedad
     * 
     * @return void
     */
    function setNombresSolicitante($nombresSolicitante)
    {
        $this->_nombresSolicitante = $nombresSolicitante;
    }

    /**
     * Establece la propiedad
     * 
     * @param string $apellidosSolicitante Propiedad
     * 
     * @return void
     */
    function setApellidosSolicitante($apellidosSolicitante)
    {
        $this->_apellidosSolicitante = $apellidosSolicitante;
    }

    /**
     * Establece la propiedad
     * 
     * @param int $telefonoFijo Propiedad
     * 
     * @return void
     */
    function setTelefonoFijo($telefonoFijo)
    {
        $this->_telefonoFijo = $telefonoFijo;
    }

    /**
     * Establece la propiedad
     * 
     * @param int $telefonoFijoExt Propiedad
     * 
     * @return void
     */
    function setTelefonoFijoExt($telefonoFijoExt)
    {
        $this->_telefonoFijoExt = $telefonoFijoExt;
    }

    /**
     * Establece la propiedad
     * 
     * @param int $telefonoMovil Propiedad
     * 
     * @return void
     */
    function setTelefonoMovil($telefonoMovil)
    {
        $this->_telefonoMovil = $telefonoMovil;
    }

    /**
     * Establece la propiedad
     * 
     * @param string $correo Propiedad
     * 
     * @return void
     */
    function setCorreo($correo)
    {
        $this->_correo = $correo;
    }

    /**
     * Establece la propiedad
     * 
     * @param string $medidor Propiedad
     * 
     * @return void
     */
    function setMedidor($medidor)
    {
        $this->_medidor = $medidor;
    }

    /**
     * Establece la propiedad
     * 
     * @param string $tipoTicket Propiedad
     * 
     * @return void
     */
    function setTipoTicket($tipoTicket)
    {
        $this->_tipoTicket = $tipoTicket;
    }

    /**
     * Establece la propiedad
     * 
     * @param string $solicitud Propiedad
     * 
     * @return void
     */
    function setSolicitud($solicitud)
    {
        $this->_solicitud = $solicitud;
    }

    /**
     * Establece la propiedad
     * 
     * @param string $incidencia Propiedad
     * 
     * @return void
     */
    function setIncidencia($incidencia)
    {
        $this->_incidencia = $incidencia;
    }

}
