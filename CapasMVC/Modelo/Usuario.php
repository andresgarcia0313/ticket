<?php

/**
 * Archivo de class o molde para los objetos Usuario
 *
 * Este archivo contrendra los atributos y metodos del Usuario 
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
 * @category   Usuario
 * @package    Modelo
 * @author     Andres Eduardo Garcia Marquez <andresgarcia0313@gmail.com>
 * @copyright  2019 The Andres Eduardo Garcia Marquez Group
 * @license    http://www.andresgarcia.xyz Andres Garcia License 0.01
 * @version    GIT: $Id$
 * @link       http://www.andresgarcia.xyz
 * @see        Clase de base de datos
 * @since      Archivo disponible desde la versión 0.01
 * @deprecated Deprecated in Release 2.0.0 Por cambio en Modelo
 */
/*
 * A continuaciòn se incluye, las constante define y $ _GLOBAL sin bloques  
 * de documentos apropiados evitando que phpDocumentor cree que están 
 * documentados en el documento a nivel de página.
 */
include_once 'BaseDeDatos.php';

/**
 * Corta descripsiòn para la clase: Gestiòn de informaciòn de usuarios
 *
 * Larga descripsiòn para la clase: Gestiòn de informaciòn de usuarios
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
class Usuario
{

    /** @var string <p>Correo</p> */
    private $correo;

    /** @var string <p>Clave</p> */
    private $clave;

    public function __construct($correo, $clave)
    {
        $this->correo = $correo;
        $this->clave = $clave;
    }

    public function existe()
    {
        $objBaseDeDatos = new BaseDeDatos("SELECT correo, clave FROM Usuario WHERE correo='$this->correo' AND clave='$this->clave';");
        if ($objBaseDeDatos->getConteoDeRegistros() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

