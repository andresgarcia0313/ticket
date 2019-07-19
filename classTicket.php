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

    private $central;
    private $nombresSolicitante;
    private $apellidosSolicitante;
    private $telefonoFijo;
    private $telefonoFijoExt;
    private $telefonoMovil;
    private $correo;
    private $medidor;
    private $tipoTicket;
    private $solicitud;
    private $incidencia;
    
    public function __construct($datosTicket) {
        echo "<p>datos ticket</p>";
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
        /*
        //Las siguientes lineas de código tienen la misión de ser usadas para depuración
        echo $this->central;
        echo $this->nombresSolicitante;
        echo $this->apellidosSolicitante;
        echo $this->telefonoFijo;
        echo $this->telefonoFijoExt;
        echo $this->telefonoMovil;
        echo $this->correo;
        echo $this->medidor;
        echo $this->tipoTicket;
        echo $this->solicitud;
        echo $this->incidencia;**/
    }

    public function guardar($datosTicket) {
        echo "<br>datos ticket<br>";
        print_r($datosTicket);
        return "Se Ha solicitado que se almacene en el motor de datos";
    }

    public function consultar() {
        
    }

}
